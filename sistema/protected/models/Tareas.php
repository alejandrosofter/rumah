<?php

/**
 * This is the model class for table "tareas".
 *
 * The followings are the available columns in table 'tareas':
 * @property integer $idTarea
 * @property string $fechaTarea
 * @property string $prioridadTarea
 * @property string $estadoTarea
 * @property string $descripcionTarea
 * @property string $tipoTarea
 * @property integer $idClienteTarea
 */
class Tareas extends CActiveRecord
{
	public $cliente;
	public $cantidadTareas;
	public $checkTarea;
	public $idCliente;
	public $groupEstados;
	public $tipoImpresion;
	public $idEmpre;
	public $fechaInicio;
	public $fechaFin;
	public $visitaRutina;
        public $usuarios;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return Tareas the static model class
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
	public  function beforeDelete()
	{
		parent::beforeDelete();
		$modeloAlerta=new Alertas;
		
      	$alerta=Alertas::model()->buscarElemento($this->idTarea);
      	if($alerta!=false)
      			Alertas::model()->cambiarEstado($alerta['idAlerta'],'Baja');
      		
      	
      		
      	
      	return parent::beforeDelete();
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tareas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fechaTarea, prioridadTarea, estadoTarea, descripcionTarea, tipoTarea, idClienteTarea', 'required'),
			array('idClienteTarea,visitaRutina', 'numerical', 'integerOnly'=>true),
			
			array('prioridadTarea, estadoTarea, tipoTarea', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idTarea, fechaTarea, prioridadTarea, estadoTarea, descripcionTarea, tipoTarea, idClienteTarea', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idTarea' => 'Id Tarea',
			'fechaTarea' => 'Fecha Tarea',
			'prioridadTarea' => 'Prioridad Tarea',
			'estadoTarea' => 'Estado Tarea',
			'descripcionTarea' => 'Descripcion Tarea',
			'tipoTarea' => 'Tipo Tarea',
			'idClienteTarea' => 'Cliente',
			'cantidadTareas' => 'Estados',
		);
	}
	public function tareasPendientes()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idTarea',$this->idTarea);
		$criteria->compare('fechaTarea',$this->fechaTarea,true);
		$criteria->compare('prioridadTarea',$this->prioridadTarea,true);
		$criteria->compare('estadoTarea','Para Realizar',true,'or');
		$criteria->compare('estadoTarea','Stand-By',true,'or');
		$criteria->compare('descripcionTarea',$this->descripcionTarea,true);
		$criteria->compare('tipoTarea',$this->tipoTarea,true);
		$criteria->compare('idClienteTarea',$this->idClienteTarea);
		
		$criteria->select = "count(tareas_estados.idTarea) as cantidadTareas,t.*, if(clientes.tipoCliente='Empresa',clientes.razonSocial,CONCAT(clientes.apellido,', ',clientes.nombre)) as cliente";
		$criteria->join = "LEFT JOIN clientes on clientes.idCliente = t.idClienteTarea " .
				"LEFT JOIN tareas_estados on tareas_estados.idTarea = t.idTarea";
		$criteria->group ='t.idTarea';

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function consultarPendientes()
	{
		$connection=Yii::app()->getDb();
		$usuario=Yii::app()->user->id;
			$sql="SELECT count(t.idTarea)as cantidad FROM tareas t

						
				WHERE t.estadoTarea<>'Finalizada' 
			";
			$command=$connection->createCommand($sql);
            $res=$command->queryAll();
            if (count($res)>0) return $res[0];
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function consultarTareasPendientes($idCliente)
	{
				$criteria=new CDbCriteria;
		$sort = new CSort;
       
        //busqueda entre fechasinicio fin y !!
		
		$criteria->select = "t.*,GROUP_CONCAT(tareas_estados.fechaEstadoTarea,' ',tareas_estados.detalleEstadoTarea) as groupEstados," .
				"(select estadoTarea from tareas_estados WHERE idTarea=t.idTarea 
		ORDER by tareas_estados.idTarea desc LIMIT 1) as estadoTarea,
		 if(clientes.tipoCliente='Empresa',clientes.razonSocial,CONCAT(clientes.apellido,', ',clientes.nombre)) as cliente";
		$criteria->join = "LEFT JOIN clientes on clientes.idCliente = t.idClienteTarea " .
				"LEFT JOIN tareas_estados on tareas_estados.idTarea = t.idTarea ";

		$criteria->condition = "t.estadoTarea <>'Finalizada'";
		$criteria->compare('idClienteTarea',$idCliente);
		$criteria->group ='t.idTarea';
		 $criteria->order = 't.fechaTarea desc';
	

		return Tareas::model()->findAll($criteria);
	}
	public function consultarInformeTareas($idCliente,$fechaInicio,$fechaFin)
	{
				$criteria=new CDbCriteria;
		$sort = new CSort;
       
        //busqueda entre fechasinicio fin y !!
		
		$criteria->select = "t.*,GROUP_CONCAT(tareas_estados.fechaEstadoTarea,' ',tareas_estados.detalleEstadoTarea) as groupEstados,
		 if(clientes.tipoCliente='Empresa',clientes.razonSocial,CONCAT(clientes.apellido,', ',clientes.nombre)) as cliente";
		$criteria->join = "LEFT JOIN clientes on clientes.idCliente = t.idClienteTarea " .
				"LEFT JOIN tareas_estados on tareas_estados.idTarea = t.idTarea ";
//		$criteria->compare("t.fechaTarea",'$fechaInicio',"AND",">="); // and t.fechaTarea <= '$fechaFin' " ;

		$auxIni = explode("-",$fechaInicio);
		$auxFin = explode("-",$fechaFin);
		
		$auxIni = $auxIni[2].'-'.$auxIni[1].'-'.$auxIni[0];
		$auxFin = $auxFin[2].'-'.$auxFin[1].'-'.$auxFin[0];
		
		$criteria->condition = "t.fechaTarea BETWEEN '$auxIni' AND '$auxFin' ";
		$criteria->compare('idClienteTarea',$idCliente);
		$criteria->group ='t.idTarea';
		 $criteria->order = 't.fechaTarea desc';
	

		return Tareas::model()->findAll($criteria);
	}
public function consultarTareas($tipoLibro,$mes,$ano)
	{
		
		$criteria=new CDbCriteria;
		
		$sort = new CSort;
        $sort->defaultOrder = 'idEmpresa desc';
          

		$criteria->select = "t.*,CONCAT(clientes.apellido,', ',clientes.nombre)) as cliente ";
		$criteria->join = " INNER JOIN clientes on clientes.idCliente = t.idClienteTarea ";
		
		
		$res= new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort,'pagination'=>array(
        'pageSize'=>2000,
    ),
		));
		return $res;
	}
	public function consultarTareasCliente($idCliente)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$sort = new CSort;
        $sort->defaultOrder = 'idTarea desc';
        
		$criteria->compare('idTarea',$this->idTarea);
		$criteria->compare('fechaTarea',$this->fechaTarea,true);
		$criteria->compare('prioridadTarea',$this->prioridadTarea,true);
		$criteria->compare('estadoTarea',$this->estadoTarea,true);
		$criteria->compare('descripcionTarea',$this->descripcionTarea,true);
		$criteria->compare('tipoTarea',$this->tipoTarea,true);
		$criteria->compare('idClienteTarea',$idCliente);
		$criteria->select = "count(tareas_estados.idTarea) as cantidadTareas,t.*, clientes.idCliente as idCliente ,
		 if(clientes.tipoCliente='Empresa',clientes.razonSocial,CONCAT(clientes.apellido,', ',clientes.nombre)) as cliente";
		$criteria->join = "LEFT JOIN clientes on clientes.idCliente = t.idClienteTarea " .
				"LEFT JOIN tareas_estados on tareas_estados.idTarea = t.idTarea ";
		$criteria->group ='t.idTarea';
	

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort,
		));
	}
	public function consultarMiArea($pag=10)
	{
		$criteria=new CDbCriteria;
		$sort = new CSort;
        $sort->defaultOrder = 't.idTarea desc';

		$criteria->compare('usuarios.idAreaUsuario',Yii::app()->user->idArea);
		$criteria->compare('t.estadoTarea','<>Finalizada');
		$criteria->select = "count(tareas_estados.idTarea) as cantidadTareas,t.*, clientes.idCliente as idCliente , 
		if(clientes.tipoCliente='Empresa',clientes.razonSocial,CONCAT(clientes.apellido,', ',clientes.nombre)) as cliente";
		$criteria->join = "LEFT JOIN clientes on clientes.idCliente = t.idClienteTarea " .
				"LEFT JOIN tareas_estados on tareas_estados.idTarea = t.idTarea ".
				"LEFT JOIN tareas_destinatarios on tareas_destinatarios.idTarea = t.idTarea ".
				"LEFT JOIN usuarios on usuarios.idUsuario = tareas_destinatarios.idUsuario";
		$criteria->group ='t.idTarea';
	
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort,'pagination'=>array(
        'pageSize'=>$pag,
		)));
	}
	public function consultarMisTareas($pag=10)
	{
		$criteria=new CDbCriteria;
		$sort = new CSort;
        $sort->defaultOrder = 't.idTarea desc';

//		$criteria->compare('descripcionTarea',$this->descripcionTarea,true);
		
		$criteria->select = "count(tareas_estados.idTarea) as cantidadTareas,t.*, if(clientes.tipoCliente='Empresa',
		clientes.razonSocial,CONCAT(clientes.apellido,', ',clientes.nombre)) as cliente, clientes.idCliente as idCliente,
		tareas_coordinaciones.idTarea as checkTarea";
		
		
		
		
		
		$criteria->join = "LEFT JOIN clientes on clientes.idCliente = t.idClienteTarea " .
				"LEFT JOIN tareas_estados on tareas_estados.idTarea = t.idTarea ".
				"LEFT JOIN tareas_destinatarios on tareas_destinatarios.idTarea = t.idTarea ".
				"LEFT JOIN tareas_coordinaciones on tareas_coordinaciones.idTarea = t.idTarea";
		$criteria->group ='t.idTarea';
		
	if(isset($_GET['nombre']) && trim($_GET['nombre'])!="")
		{		
			$criteria->compare('clientes.razonSocial',$_GET['nombre'],true);
			$criteria->compare('clientes.apellido',$_GET['nombre'],true,"OR"); // That didn't work
			$criteria->compare('clientes.nombre',$_GET['nombre'],true,"OR"); // That didn't work
//BUSCA UNICAMENTE POR APELLIDO; LA IDEA ES Q BUSQUE POR NOMBRE Y APELLIDO!!	
		}
	if(isset($_GET['cliente']) && trim($_GET['cliente'])!="")
		{		
			$criteria->compare('clientes.razonSocial',$_GET['cliente'],true);
			$criteria->compare('clientes.apellido',$_GET['cliente'],true,"OR"); // That didn't work
			$criteria->compare('clientes.nombre',$_GET['cliente'],true,"OR"); // That didn't work
//BUSCA UNICAMENTE POR APELLIDO; LA IDEA ES Q BUSQUE POR NOMBRE Y APELLIDO!!	
		}
	
		if(isset($_GET['prioridadTarea']) && trim($_GET['prioridadTarea'])!="")
		{		
			$criteria->compare('prioridadTarea',$_GET['prioridadTarea'],true);	
		}
		if(isset($_GET['estadoTarea']) && trim($_GET['estadoTarea'])!="")
		{		
			$criteria->compare('t.estadoTarea',$_GET['estadoTarea'],true);	
		}

		
		
		//if($todas) return self::model()->findAll($criteria)->getData();
		$criteria->compare('tareas_destinatarios.idUsuario',Yii::app()->user->id);
		$criteria->compare('t.estadoTarea','Para Realizar');
		$criteria->compare('t.estadoTarea',' <> Para Realizar');
		
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort,'pagination'=>array(
        'pageSize'=>$pag,
		)));
	}
	
	public function consultarTareasClientePendientes($idCliente)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('estadoTarea','<>Finalizada',false);
                if ($idCliente!='')
                    $criteria->compare('idClienteTarea',$idCliente);
		$criteria->select = "count(tareas_estados.idTarea) as cantidadTareas,t.*,GROUP_CONCAT(usuarios.nombre) as usuarios, clientes.idCliente as idCliente  , 
		if(clientes.tipoCliente='Empresa',clientes.razonSocial,CONCAT(clientes.apellido,', ',clientes.nombre)) as cliente";
		$criteria->join = "LEFT JOIN clientes on clientes.idCliente = t.idClienteTarea " .
				"LEFT JOIN tareas_estados on tareas_estados.idTarea = t.idTarea ".
                        "LEFT JOIN tareas_destinatarios on tareas_destinatarios.idTarea = t.idTarea ".
                        "LEFT JOIN usuarios on usuarios.idUsuario = tareas_destinatarios.idUsuario";
		$criteria->group ='t.idTarea';
	

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function finalizarTarea($idTarea)
	{
		$tarea = Tareas::model()->findByPk($idTarea);
        $tarea->estadoTarea = 'Finalizada'; 
        $tarea->save();
	}
	public function consultarTodas()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->select = "t.idTarea, CONCAT(DATE_FORMAT( t.fechaTarea , '%d-%m-%y' ),' - CLIENTE: ',CONCAT(clientes.apellido,' ',clientes.nombre,' ',clientes.razonSocial ),' VISITA: ',IF(t.visitaRutina=1,'SI','NO') ,' DESCRIPCION: ',t.descripcionTarea,' REF: ',t.idTarea) as descripcionTarea";
                $criteria->join="LEFT JOIN clientes on clientes.idCliente = t.idClienteTarea";
                $criteria->order='t.idTarea desc';
		return self::model()->findAll($criteria);
	}
        public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idTarea',$this->idTarea);
		$criteria->compare('fechaTarea',$this->fechaTarea,true);
		$criteria->compare('prioridadTarea',$this->prioridadTarea,true);
		$criteria->compare('estadoTarea',$this->estadoTarea,true);
		$criteria->compare('descripcionTarea',$this->descripcionTarea,true);
		$criteria->compare('tipoTarea',$this->tipoTarea,true);
		$criteria->compare('idClienteTarea',$this->idClienteTarea);
		
		$criteria->select = "count(tareas_estados.idTarea) as cantidadTareas,t.*, if(clientes.tipoCliente='Empresa',
		clientes.razonSocial,CONCAT(clientes.apellido,', ',clientes.nombre)) as cliente, clientes.idCliente as idCliente";
		$criteria->join = "LEFT JOIN clientes on clientes.idCliente = t.idClienteTarea " .
				"LEFT JOIN tareas_estados on tareas_estados.idTarea = t.idTarea";
		$criteria->group ='t.idTarea';
                $criteria->order='t.idTarea desc';

	if(isset($_GET['cliente']) && trim($_GET['cliente'])!="")
		{		
			$criteria->compare('clientes.razonSocial',$_GET['cliente'],true);
			$criteria->compare('clientes.apellido',$_GET['cliente'],true,"OR"); // That didn't work
			$criteria->compare('clientes.nombre',$_GET['cliente'],true,"OR"); // That didn't work
//BUSCA UNICAMENTE POR APELLIDO; LA IDEA ES Q BUSQUE POR NOMBRE Y APELLIDO!!	
		}
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function getPrioridades()
	{
    	return array('Normal' => 'Normal', 'Urgente' => 'Urgente');
	}
	public function getEstados()
	{
    	return array('Para Realizar' => 'Para Realizar', 'Finalizada' => 'Finalizada', 'Stand-By' => 'Stand-By');
	}
	public function getTipos()
	{
    	return array('Rutina' => 'Rutina', 'Eventualidad' => 'Eventualidad');
	}
}