<?php

/**
 * This is the model class for table "ordenesTrabajo".
 *
 * The followings are the available columns in table 'ordenesTrabajo':
 * @property integer $idOrdenTrabajo
 * @property integer $idCliente
 * @property string $descripcionCliente
 * @property string $descripcionEncargado
 * @property string $estadoOrden
 * @property string $fechaIngreso
 * @property string $prioridad
 * @property string $tipoOrden
 * @property string $observaciones
 */
class OrdenesTrabajo extends CActiveRecord
{
	public $cliente;
	public $cantidadEstados;
	public $fechaFinalizo;
	public $estado;
	public $estadoOrden;
	public $checkOrdenes;
	public $nombre;
	public $facturada;
	public $estados;
	public $idPresupuesto;//lo pongo solamente para ligar el presupuesto con la orden .. no esta en tabla!
        public $duracionDias;
        public $diasFaltantes;
        public $usuario;
        public $idUsuario;
        public $idRutina;
        public $costo;
        
	/**
	 * Returns the static model of the specified AR class.
	 * @return OrdenesTrabajo the static model class
	 */
        
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function behaviors()
	{
    	return array(
        	'LoggableBehavior'=>
            	'application.modules.auditTrail.behaviors.LoggableBehavior',
    	);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ordenesTrabajo';
	}
        public function consultarOrdenesRealizadas($idCliente)
        {
		$criteria=new CDbCriteria;
		$sort = new CSort;
                $sort->defaultOrder = 't.idOrdenTrabajo desc';

		
		$criteria->compare('estadoOrden','Realizada');
		$criteria->compare('idCliente',$idCliente);

		return self::model()->findAll($criteria);
        }
        public function getFormaOrdenExtra($idOrden)
        {
            $orden=OrdenesTrabajo::model()->findByPk($idOrden);
        	$cliente= Clientes::model()->findByPk($orden->idCliente);
        	$val=Yii::app()->settings->getKey( 'ORDEN_TRABAJO');
        	
        	$modelSettings=Settings::model();
        	
        	$maxCliente=strip_tags($modelSettings->getValorSistema( 'IMPRESION_MAX_CLIENTE'));
        	$maxDetalle=strip_tags($modelSettings->getValorSistema( 'IMPRESION_MAX_DETALLE'));
        	$maxDetalle2=strip_tags($modelSettings->getValorSistema( 'IMPRESION_MAX_DETALLE2'));
        	
        	$nombreCliente=($cliente->tipoCliente=='Empresa')?$cliente->nombreFantasia:$cliente->apellido.', '.$cliente->nombre;
			$paramentros['cliente']= substr($nombreCliente, 0, (int)$maxCliente);
			$paramentros['motivo']= substr($orden->descripcionCliente, 0, $maxDetalle);
			$paramentros['nroOrden']= $orden->idOrdenTrabajo;
			$paramentros['fechaOrden']= Yii::app()->dateFormatter->format("dd-M-y",$orden->fechaIngreso);
			$paramentros['telefono']= $cliente->telefono;
			$paramentros['celular']= $cliente->celular;
			$paramentros['descripcionCliente']= substr($orden->descripcionCliente, 0, 300);
			$paramentros['descripcionEncargado']= substr($orden->descripcionEncargado, 0, 300);
//			$val = str_replace("%prioridad", $orden->descripcionCliente."PATOOOO".$orden->descripcionEncargado,$val);
			$paramentros['prioridad']= $orden->prioridad;
                        $paramentros['duracionDias']= $orden->duracionDias;
			$paramentros['tipoCliente']= $cliente->tipoCliente;
                        
                        return $modelSettings->getValorSistema('IMPRESION_ORDEN_EXTRA', $paramentros, 'impresiones');
			
        }
        public function getFormaOrden($idOrden)
        {
            $orden=OrdenesTrabajo::model()->findByPk($idOrden);
        	$cliente= Clientes::model()->findByPk($orden->idCliente);
        	$val=Yii::app()->settings->getKey( 'ORDEN_TRABAJO');
        	
        	$modelSettings=Settings::model();
        	
        	$maxCliente=strip_tags($modelSettings->getValorSistema( 'IMPRESION_MAX_CLIENTE'));
        	$maxDetalle=strip_tags($modelSettings->getValorSistema( 'IMPRESION_MAX_DETALLE'));
        	$maxDetalle2=strip_tags($modelSettings->getValorSistema( 'IMPRESION_MAX_DETALLE2'));
        	
        	$nombreCliente=($cliente->tipoCliente=='Empresa')?$cliente->nombreFantasia:$cliente->apellido.', '.$cliente->nombre;
			$val = str_replace("%cliente", substr($nombreCliente, 0, (int)$maxCliente),$val);
			$val = str_replace("%motivo", substr($orden->descripcionCliente, 0, $maxDetalle),$val);
			$val = str_replace("%nroOrden", $orden->idOrdenTrabajo,$val);
			$val = str_replace("%fechaOrden", Yii::app()->dateFormatter->format("dd-M-y",$orden->fechaIngreso),$val);
			$val = str_replace("%telefono", $cliente->telefono,$val);
			$val = str_replace("%celular", $cliente->celular,$val);
			$val = str_replace("%descripcionCliente", substr($orden->descripcionCliente, 0, 300),$val);
			$val = str_replace("%descripcionEncargado", substr($orden->descripcionEncargado, 0, 300),$val);
//			$val = str_replace("%prioridad", $orden->descripcionCliente."PATOOOO".$orden->descripcionEncargado,$val);
			$val = str_replace("%prioridad", $orden->prioridad,$val);
                        $val = str_replace("%duracionDias", $orden->duracionDias,$val);
			$val = str_replace("%tipoCliente", $cliente->tipoCliente,$val);
			return $val;
        }
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idCliente,idRutina, descripcionCliente, descripcionEncargado, prioridad, fechaIngreso', 'required'),
			array('idPresupuesto,idUsuario,duracionDias, idCliente', 'numerical', 'integerOnly'=>true),
			array('estadoOrden, prioridad, tipoOrden', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idOrdenTrabajo, idCliente, descripcionCliente, descripcionEncargado, estadoOrden,
			 fechaIngreso, prioridad, tipoOrden, observaciones, cliente', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		 return array(
            'clientes'=>array(self::BELONGS_TO, 'Clientes', 'idCliente','joinType'=>'LEFT JOIN'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idOrdenTrabajo' => 'Orden Nro',
                    'idRutina' => 'Rutina',
			'idCliente' => 'Cliente',
			'cliente' => 'cliente',
			'descripcionCliente' => 'Descripcion Cliente',
			'descripcionEncargado' => 'Descripcion Encargado',
			'estadoOrden' => 'Estado Orden',
			'fechaIngreso' => 'Fecha Ingreso',
			'prioridad' => 'Prioridad',
			'tipoOrden' => 'Tipo Orden',
			'observaciones' => 'Observaciones',
			'cantidadEstados' => 'Estado',
                    'duracionDias' => 'Duracion en Dias',
		);
	}
	public static function getMenuCarroCompras()
	{
		$datos = isset(Yii::app()->request->cookies['ordenesCarro'])?Yii::app()->request->cookies['ordenesCarro']->value:'';
		$datosArray=explode(',',$datos);
		$cant=count($datosArray)-1;
		if($cant>0)
			return  CHtml::link($cant. '  Orden/es', 'index.php?r=stock/consultarCarro', array('submit'=>'index.php?r=stock/consultarCarro', 'class'=>'btn small susscces',
'params'=>array('')));
			
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function getEstados()
	{
    	return array('Trabajando' => 'Trabajando', 'Tercero' => 'Tercero', 'Stand-by' => 'Stand-by','Sin Asignar' => 'Sin Asignar', 'Realizada' => 'Realizada', 'Facturado' => 'Facturado');
	}
	public function getPrioridades()
	{
    	return array('Normal' => 'Normal', 'Urgente' => 'Urgente');
	}
	public function paraRealizar()
	{
		$criteria=new CDbCriteria;
		$sort = new CSort;
        $sort->defaultOrder = 't.idOrdenTrabajo desc';

		$criteria->compare('idOrdenTrabajo',$this->idOrdenTrabajo);
		$criteria->compare('clientes.nombre',$this->cliente,true);
		$criteria->compare('descripcionCliente',$this->descripcionCliente,true);
		$criteria->compare('descripcionEncargado',$this->descripcionEncargado,true);
		$criteria->compare('estadoOrden','Para Realizar',true);
		$criteria->compare('fechaIngreso',$this->fechaIngreso,true);
		$criteria->compare('prioridad',$this->prioridad,true);
		$criteria->compare('tipoOrden',$this->tipoOrden,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->order = "idOrdenTrabajo desc";
		
		$criteria->select = "count(ordenesTrabajo_estados.idOrdenTrabajo) as cantidadEstados ,t.*, if(clientes.condicionIva='Resp.Inscripto',clientes.razonSocial,CONCAT(clientes.apellido,', ',clientes.nombre)) as cliente";
		$criteria->join = "LEFT JOIN clientes on clientes.idCliente = t.idCliente" .
			" LEFT JOIN ordenesTrabajo_estados on ordenesTrabajo_estados.idOrdenTrabajo = t.idOrdenTrabajo";
		$criteria->group=' t.idOrdenTrabajo';
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort
		));
	}
	public function finalizarOrden($idOrden,$estado='Realizada')
	{
	if($idOrden!=''){
		$modelOrden=new OrdenesTrabajoEstados;
	$modelOrden->idOrdenTrabajo=$idOrden;
        $modelOrden->idUsuario=Yii::app()->user->id;
	$modelOrden->fechaEstado=Date('Y-m-d');
	$modelOrden->estado=$estado;
	$modelOrden->detalleEstado='Finalizado automatico de Facturacion';
	$modelOrden->save();
	}
	

	}
	public static function vaciarCarroOrdenes()
	{
		Yii::app()->request->cookies['ordenesCarro'] = new CHttpCookie('ordenesCarro', '');
	}
	public function realizadas()
	{
		$criteria=new CDbCriteria;
		$sort = new CSort;
        $sort->defaultOrder = 't.idOrdenTrabajo desc';

		$criteria->compare('idOrdenTrabajo',$this->idOrdenTrabajo);
		$criteria->compare('t.idCliente',$this->idCliente);
		$criteria->compare('descripcionCliente',$this->descripcionCliente,true);
		$criteria->compare('descripcionEncargado',$this->descripcionEncargado,true);
		$criteria->compare('estadoOrden','Realizado',true);
		$criteria->compare('fechaIngreso',$this->fechaIngreso,true);
		$criteria->compare('prioridad',$this->prioridad,true);
		$criteria->compare('tipoOrden',$this->tipoOrden,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		
		$criteria->select = "(select fechaEstado from ordenesTrabajo_estados WHERE idOrdenTrabajo=t.idOrdenTrabajo ORDER by ordenesTrabajo_estados.idEstadoOrden desc LIMIT 1) as fechaFinalizo, count(ordenesTrabajo_estados.idOrdenTrabajo) as cantidadEstados ,t.*, if(clientes.condicionIva='Resp.Inscripto',clientes.razonSocial,CONCAT(clientes.apellido,', ',clientes.nombre)) as cliente";
		$criteria->join = "LEFT JOIN clientes on clientes.idCliente = t.idCliente" .
			" LEFT JOIN ordenesTrabajo_estados on ordenesTrabajo_estados.idOrdenTrabajo = t.idOrdenTrabajo";
		$criteria->group=' t.idOrdenTrabajo';

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort
		));
	}
	public function facturadas()
	{
		$criteria=new CDbCriteria;
		$sort = new CSort;
        $sort->defaultOrder = 't.idOrdenTrabajo desc';

		$criteria->compare('idOrdenTrabajo',$this->idOrdenTrabajo);
		$criteria->compare('t.idCliente',$this->idCliente);
		$criteria->compare('descripcionCliente',$this->descripcionCliente,true);
		$criteria->compare('descripcionEncargado',$this->descripcionEncargado,true);
		$criteria->compare('estadoOrden','Facturado',true);
		$criteria->compare('fechaIngreso',$this->fechaIngreso,true);
		$criteria->compare('prioridad',$this->prioridad,true);
		$criteria->compare('tipoOrden',$this->tipoOrden,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->order = "idOrdenTrabajo desc";
		
		$criteria->select = "t.*, if(clientes.condicionIva='Resp.Inscripto',clientes.razonSocial,CONCAT(clientes.apellido,', ',clientes.nombre)) as cliente";
		$criteria->join = "LEFT JOIN clientes on clientes.idCliente = t.idCliente";

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort
		));
	}
	public function consultarOrdenes($idPresupuesto)
	{
		$modPresupuesto=new Presupuestos;
		$presu=Presupuestos::model()->findByPk($idPresupuesto);
		$criteria=new CDbCriteria;
		$sort = new CSort;
        $sort->defaultOrder = 't.idOrdenTrabajo desc';

		
		$criteria->compare('t.idCliente',$presu->idClientePresupuesto);
		

		
		$criteria->select = "t.*, SUBSTRING((concat( t.fechaIngreso,' - ',t.descripcionCliente,' ...')  ),1,80 ) as nombre,
		(select estado from ordenesTrabajo_estados WHERE idOrdenTrabajo=t.idOrdenTrabajo 
		ORDER by ordenesTrabajo_estados.idEstadoOrden desc LIMIT 1) as estado,
		CONCAT(clientes.apellido,' ',clientes.razonSocial) as cliente";
	 	$criteria->join = "LEFT JOIN clientes on clientes.idCliente = t.idCliente  ";
		$criteria->group=' t.idOrdenTrabajo';
		return self::model()->findAll($criteria);
	}

	public function consultarPendientes()
	{
		$connection=Yii::app()->getDb();
			$sql="SELECT count(t.idOrdenTrabajo)as cantidad  FROM ordenesTrabajo t
							
				WHERE ((select estado from ordenesTrabajo_estados WHERE idOrdenTrabajo=t.idOrdenTrabajo 
ORDER by ordenesTrabajo_estados.idEstadoOrden desc LIMIT 1) <> 'Realizada'
 AND 
(select estado from ordenesTrabajo_estados WHERE idOrdenTrabajo=t.idOrdenTrabajo 
ORDER by ordenesTrabajo_estados.idEstadoOrden desc LIMIT 1) <> 'Facturado'
 AND 
(select estado from ordenesTrabajo_estados WHERE idOrdenTrabajo=t.idOrdenTrabajo 
ORDER by ordenesTrabajo_estados.idEstadoOrden desc LIMIT 1) <> 'Finalizado')
			";
			$command=$connection->createCommand($sql);
            $res=$command->queryAll();
            return $res[0];
	}
	public function search()
	{
		$criteria=new CDbCriteria;
		$sort = new CSort;
        $sort->defaultOrder = 't.idOrdenTrabajo desc';

		$criteria->compare('t.idOrdenTrabajo',$this->idOrdenTrabajo);
		$criteria->compare('clientes.nombre',$this->cliente);
		$criteria->compare('t.idCliente',$this->idCliente);
		$criteria->compare('descripcionCliente',$this->descripcionCliente,true);
		$criteria->compare('descripcionEncargado',$this->descripcionEncargado,true);
		//$criteria->compare('estadoOrden',$this->estadoOrden,true);
		$criteria->compare('fechaIngreso',$this->fechaIngreso,true);
		$criteria->compare('prioridad',$this->prioridad,true);
		$criteria->compare('tipoOrden',$this->tipoOrden,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		if(isset($_GET['estadoOrden']))
		$criteria->compare('(select estado from ordenesTrabajo_estados WHERE idOrdenTrabajo=t.idOrdenTrabajo 
ORDER by ordenesTrabajo_estados.idEstadoOrden desc LIMIT 1)',$_GET['estadoOrden']);
		
			
			
		if(isset($_GET['cliente']))
		{ 
			$criteria->compare('clientes.razonSocial',$_GET['cliente'],true,"OR"); // That didn't work
			$criteria->compare('clientes.apellido',$_GET['cliente'],true,"OR"); // That didn't work
			$criteria->compare('clientes.nombre',$_GET['cliente'],true,"OR"); // That didn't work
		}
		
		if(isset($_GET['idOrdenTrabajo']))
		{ 
			$criteria->compare('t.idOrdenTrabajo',$_GET['idOrdenTrabajo'],true,"OR"); // That didn't work
		}
		

		
		$criteria->select = "t.*, count(ordenesTrabajo_estados.idOrdenTrabajo) as cantidadEstados,GROUP_CONCAT(ordenesTrabajo_estados.estado,':',ordenesTrabajo_estados.detalleEstado SEPARATOR '<br>') as estados,
		(select estado from ordenesTrabajo_estados WHERE idOrdenTrabajo=t.idOrdenTrabajo 
		ORDER by ordenesTrabajo_estados.idEstadoOrden desc LIMIT 1) as estado, facturasOrdenesTrabajo.idFacturaSaliente as facturada, 
		CONCAT(clientes.apellido,' ',clientes.razonSocial) as cliente ";
	 	$criteria->join = "LEFT JOIN clientes on clientes.idCliente = t.idCliente  " .
	 			"LEFT JOIN facturasOrdenesTrabajo on facturasOrdenesTrabajo.idOrdenTrabajo = t.idOrdenTrabajo ".
	 			" LEFT JOIN ordenesTrabajo_estados on ordenesTrabajo_estados.idOrdenTrabajo = t.idOrdenTrabajo ";
	
			
		$criteria->group=' t.idOrdenTrabajo';
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort
		));
	}
        private function checkAlertas($model)
        {
             $cliente=Clientes::model()->findByPk($model->idCliente);
                $nombreCliente=$cliente->apellido.' '.$cliente->nombre.' '.$cliente->razonSocial;
		if(!Alertas::model()->existeAlerta($this->idOrdenTrabajo))
                if(Settings::model()->getValorSistema('SERVICIOS_ALERTAS_ACTIVAS')=='Activa')
      		{
      		$modelAlerta= new Alertas;
      		$modelAlerta->titulo=$nombreCliente.': '.$model->descripcionCliente;
      		$modelAlerta->descripcion=' Orden Auto generada, para quitar la alerta debe poner la orden como finalizada';
      		$modelAlerta->nivelAlerta=($this->prioridad=='Normal')?'Media':'Alta';
      		$modelAlerta->tipoAlerta='Sistema';
      		$modelAlerta->estadoAlerta='Activa';
      		$modelAlerta->linkSolucion='Activa';
      		$modelAlerta->area='Ordenes';
      		$modelAlerta->controlador='ordenesTrabajo';
      		
      		$fecha = new DateTime($this->fechaIngreso);
		$intervalo = new DateInterval('P'.Settings::model()->getValorSistema('SERVICIOS_DIAS_FINALIZA').'D');
		$fecha->add($intervalo);
			
      		$modelAlerta->fechaInicioAlerta=$fecha->format('Y-m-d');
      		$modelAlerta->fechaVencimiento='0000-00-00';
      		$modelAlerta->idElemento=$model->idOrdenTrabajo;
      		$modelAlerta->save();
      		
      		}
        }
	public  function afterSave()
	{
            parent::afterSave();
            $this->checkAlertas($this);
            Mensajes::model()->notificar($this->descripcionCliente,$this->fechaIngreso,$this->idCliente);
            return parent::afterSave();
	}
	public  function afterDelete()
	{
		parent::afterDelete();
		$modeloAlerta=new Alertas;
		
      	$alerta=Alertas::model()->buscarElemento($this->idOrdenTrabajo);
      	if($alerta!=false)
      			Alertas::model()->cambiarEstado($alerta['idAlerta'],'Baja');
      	return parent::afterDelete();
	}
	public function consultarDatosOrden($id)
	{
				$criteria=new CDbCriteria;
		$sort = new CSort;
        $sort->defaultOrder = 't.idOrdenTrabajo desc';

		$criteria->compare('idOrdenTrabajo',$id);
		
		$criteria->select = "t.*,(select estado from ordenesTrabajo_estados WHERE idOrdenTrabajo=t.idOrdenTrabajo ORDER by ordenesTrabajo_estados.idEstadoOrden desc LIMIT 1) as estado, if(clientes.condicionIva='Resp.Inscripto',clientes.razonSocial,CONCAT(clientes.apellido,', ',clientes.nombre)) as cliente";
	$criteria->join = "LEFT JOIN clientes on clientes.idCliente = t.idCliente";

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort
		));
	}
	public function marcarOrdenFacturada($idFactura,$idOrden)
	{
		if($idOrden != ''){
			$model=new FacturasOrdenesTrabajo;
		$model->idOrdenTrabajo=$idOrden;
		$model->idFacturaSaliente=$idFactura;
		$model->fecha=Date('Y-m-d');
		$model->save();
		}
		
	}
	public function buscarPorEstado($estado='',$arr=false)
	{
		$criteria=new CDbCriteria;
		$sort = new CSort;
        $sort->defaultOrder = 't.idOrdenTrabajo desc';

		
		$criteria->select = "(select fechaEstado from ordenesTrabajo_estados WHERE idOrdenTrabajo=t.idOrdenTrabajo 
		ORDER by ordenesTrabajo_estados.idEstadoOrden desc LIMIT 1) as fechaFinalizo,  facturasOrdenesTrabajo.idFacturaSaliente as facturada,
		count(ordenesTrabajo_estados.idOrdenTrabajo) as cantidadEstados ,t.*,GROUP_CONCAT(ordenesTrabajo_estados.estado,':',ordenesTrabajo_estados.detalleEstado SEPARATOR '<br>') as estados,
		
                usuarios.nombre as usuario,(SELECT SUM(ROUND(ordenesTrabajo_stock.importe*((ordenesTrabajo_stock.porcentajeIva/100)+1),1)*ordenesTrabajo_stock.cantidad) FROM ordenesTrabajo_stock WHERE ordenesTrabajo_stock.idOrdenTrabajo=t.idOrdenTrabajo) as costo,
		CONCAT(clientes.apellido,' ',clientes.razonSocial) as cliente,IF(t.duracionDias=0,NULL,DATEDIFF(now(),DATE_ADD(t.fechaIngreso,INTERVAL (t.duracionDias) DAY))) as diasFaltantes,
		ordenesTrabajo_coordinaciones.idOrdenes as checkOrdenes ";
		
                if(isset($_GET['descripcionCliente']) && trim($_GET['descripcionCliente'])!="")
		{ 
			$criteria->compare('descripcionCliente',$_GET['descripcionCliente'],true);
		}
	if(isset($_GET['cliente']) && trim($_GET['cliente'])!="")
		{ 
			$criteria->compare('clientes.razonSocial',$_GET['cliente'],true); // That didn't work
			$criteria->compare('clientes.apellido',$_GET['cliente'],true,"OR"); // That didn't work
			$criteria->compare('clientes.nombre',$_GET['cliente'],true,"OR"); // That didn't work
		}
		$criteria->compare('estadoOrden',$estado,true);
	if(isset($_GET['idOrdenTrabajo']) && trim($_GET['idOrdenTrabajo'])!="")
		{ 
			$criteria->compare('t.idOrdenTrabajo',$_GET['idOrdenTrabajo'],true); // That didn't work
		}
		
		$criteria->join = "LEFT JOIN clientes on clientes.idCliente = t.idCliente" .
			" LEFT JOIN ordenesTrabajo_estados on ordenesTrabajo_estados.idOrdenTrabajo = t.idOrdenTrabajo ".
		"LEFT JOIN ordenesTrabajo_coordinaciones on ordenesTrabajo_coordinaciones.idOrdenes = t.idOrdenTrabajo " .
		"LEFT JOIN facturasOrdenesTrabajo on facturasOrdenesTrabajo.idOrdenTrabajo = t.idOrdenTrabajo ".
                "LEFT JOIN usuarios on usuarios.idUsuario = t.idUsuario
                 ";
		$criteria->group=' t.idOrdenTrabajo';
//		if($estado=='')
//			$criteria->having=('cantidadEstados=0');
//			else $criteria->having=" estado = '$estado'";
//                if($estado=='Todas')
//                     $criteria->having='';
                if($arr) return self::model()->findAll($criteria);
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort
		));
	}
        public function buscarParche()
	{
		$criteria=new CDbCriteria;
		$sort = new CSort;
        $sort->defaultOrder = 't.idOrdenTrabajo desc';

		
		$criteria->select = "(select fechaEstado from ordenesTrabajo_estados WHERE idOrdenTrabajo=t.idOrdenTrabajo 
		ORDER by ordenesTrabajo_estados.idEstadoOrden desc LIMIT 1) as fechaFinalizo,  facturasOrdenesTrabajo.idFacturaSaliente as facturada,
		count(ordenesTrabajo_estados.idOrdenTrabajo) as cantidadEstados ,t.*,GROUP_CONCAT(ordenesTrabajo_estados.estado,':',ordenesTrabajo_estados.detalleEstado SEPARATOR '<br>') as estados,
		(select estado from ordenesTrabajo_estados WHERE idOrdenTrabajo=t.idOrdenTrabajo 
		ORDER by ordenesTrabajo_estados.idEstadoOrden desc LIMIT 1) as estado, 
                usuarios.nombre as usuario,
		CONCAT(clientes.apellido,' ',clientes.razonSocial) as cliente,IF(t.duracionDias=0,NULL,DATEDIFF(now(),DATE_ADD(t.fechaIngreso,INTERVAL (t.duracionDias) DAY))) as diasFaltantes,
		ordenesTrabajo_coordinaciones.idOrdenes as checkOrdenes ";
		
		
		$criteria->join = "LEFT JOIN clientes on clientes.idCliente = t.idCliente" .
			" LEFT JOIN ordenesTrabajo_estados on ordenesTrabajo_estados.idOrdenTrabajo = t.idOrdenTrabajo ".
		"LEFT JOIN ordenesTrabajo_coordinaciones on ordenesTrabajo_coordinaciones.idOrdenes = t.idOrdenTrabajo " .
		"LEFT JOIN facturasOrdenesTrabajo on facturasOrdenesTrabajo.idOrdenTrabajo = t.idOrdenTrabajo ".
                "LEFT JOIN usuarios on usuarios.idUsuario = t.idUsuario";
		$criteria->group=' t.idOrdenTrabajo';
//		if($estado=='')
//			$criteria->having=('cantidadEstados=0');
//			else $criteria->having=" estado = '$estado'";
                $criteria->having='';
                return self::model()->findAll($criteria);
		
	}
	public function buscarPendientes()
	{
		$criteria=new CDbCriteria;
		$sort = new CSort;
        $sort->defaultOrder = 't.idOrdenTrabajo desc';
      //  $criteria->compare('estado',$estado,true);
      $criteria->having=" estado<>'Realizada' AND estado<>'Facturado' AND estado<> 'Finalizado'"; 
		
		$criteria->select = "(select fechaEstado from ordenesTrabajo_estados WHERE idOrdenTrabajo=t.idOrdenTrabajo 
		ORDER by ordenesTrabajo_estados.idEstadoOrden desc LIMIT 1) as fechaFinalizo,  facturasOrdenesTrabajo.idFacturaSaliente as facturada,
		count(ordenesTrabajo_estados.idOrdenTrabajo) as cantidadEstados ,t.*,
		(select estado from ordenesTrabajo_estados WHERE idOrdenTrabajo=t.idOrdenTrabajo 
		ORDER by ordenesTrabajo_estados.idEstadoOrden desc LIMIT 1) as estado, 
		CONCAT(clientes.apellido,' ',clientes.razonSocial) as cliente,
		ordenesTrabajo_coordinaciones.idOrdenes as checkOrdenes ";
		
	if(isset($_GET['nombre']) && trim($_GET['nombre'])!="")
		{ 
			$criteria->compare('clientes.razonSocial',$_GET['nombre'],true); // That didn't work
			$criteria->compare('clientes.apellido',$_GET['nombre'],true,"OR"); // That didn't work
			$criteria->compare('clientes.nombre',$_GET['nombre'],true,"OR"); // That didn't work
		}
		
	if(isset($_GET['idOrdenTrabajo']) && trim($_GET['idOrdenTrabajo'])!="")
		{ 
			$criteria->compare('t.idOrdenTrabajo',$_GET['idOrdenTrabajo'],true); // That didn't work
		}
		
		$criteria->join = "LEFT JOIN clientes on clientes.idCliente = t.idCliente" .
			" LEFT JOIN ordenesTrabajo_estados on ordenesTrabajo_estados.idOrdenTrabajo = t.idOrdenTrabajo ".
		"LEFT JOIN ordenesTrabajo_coordinaciones on ordenesTrabajo_coordinaciones.idOrdenes = t.idOrdenTrabajo " .
		"LEFT JOIN facturasOrdenesTrabajo on facturasOrdenesTrabajo.idOrdenTrabajo = t.idOrdenTrabajo";
		$criteria->group=' t.idOrdenTrabajo';


		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort
		));
	}
}