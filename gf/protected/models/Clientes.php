<?php

/**
 * This is the model class for table "clientes".
 *
 * The followings are the available columns in table 'clientes':
 * @property integer $idCliente
 * @property string $nombre
 * @property string $apellido
 * @property string $razonSocial
 * @property string $direccion
 * @property string $telefono
 * @property string $celular
 * @property string $nombreFantasia
 * @property string $email
 * @property string $cuit
 * @property string $condicionIva
 * @property string $condicionVenta
 * @property string $codCliente
 * @property string $idJuridiccion
 * @property string $localidad
 * @property string $limiteCredito
 * @property string $fechaAlta
 * @property string $nro
 */
class Clientes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Clientes the static model class
	 */
	public $cliente;
	public $idClienteRelacion;
	public $comunicacion;
	public $nombreJuridiccion;
	public $condicionIvaCuit;
	public $letraHabitual;
	public $movimiento;
	public $fechaMovimiento;
	public $detalleMovimiento;
        public $saldo;
        public $aCuenta;
        public $pago;
	
	
	
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
		return 'clientes';
	}
	public function getCondicionVenta()
	{
    	return array('Contado' => 'Contado', 'Cuenta Corriente' => 'Cuenta Corriente');
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('telefono,direccion,condicionIva', 'required'),
			array('nombre, apellido, telefono, celular, cuit', 'length', 'max'=>30),
			array('razonSocial,nombresContactoFinanzas,emailContactoFinanzas,mobilContactoFinanzas,nombresContactoMantenimiento,emailContactoMantenimiento,mobilContactoMantenimiento', 'length', 'max'=>350),
			array('direccion', 'length', 'max'=>70),
			array('nombreFantasia, email, condicionIva, letraHabitual', 'length', 'max'=>100),
			array('condicionVenta, codCliente, idJuridiccion, localidad, limiteCredito, nro', 'length', 'max'=>255),
			array('fechaAlta', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idCliente, nombre, apellido, razonSocial, direccion, telefono, celular, nombreFantasia, email, cuit, condicionIva, condicionVenta, codCliente, idJuridiccion, localidad, limiteCredito, fechaAlta, nro', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function consultarNombre()
	{
		$criteria=new CDbCriteria;
		
		 $criteria->compare('cliente.nombre',$this->cliente,true);
		 
		$criteria->select = "idCliente, CONCAT(apellido,' ',razonSocial) as cliente";
		$criteria->order = "cliente asc";
		$datos= new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			));
		return self::model()->findAll($criteria);
	}
	public function consultarAcciones($nombre)
	{
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand(
"SELECT t.*

FROM acciones t

WHERE t.nombre like '%$nombre%'

");
            
            return $command->queryAll();
	}
	public function getCondicionesFactura()
	{
    	return array('A' => 'A', 'B' => 'B', 'C' => 'C','D' => 'D');
	}
	public function consultaMovimientos($idCliente)
	{
		$connection=Yii::app()->getDb();
		
		$sql="(SELECT facturasSalientes_view.idFacturaSaliente as idElemento,'Factura' as tipo, facturasSalientes_view.fecha, GROUP_CONCAT('Compra de ',itemsFacturaSaliente.nombreItem,' con un costo de ',CAST(facturasSalientes_view.importeFactura AS CHAR)) as detalle, facturasSalientes_view.estado as estado FROM `facturasSalientes_view` 
inner join itemsFacturaSaliente on itemsFacturaSaliente.idFacturaSaliente = facturasSalientes_view.idFacturaSaliente
WHERE idCliente='$idCliente' GROUP BY facturasSalientes_view.idFacturaSaliente) 
		 UNION all 
		(SELECT ordenesTrabajo.idOrdenTrabajo as idElemento,'Orden de Trabajo' as tipo, fechaIngreso as fecha,descripcionCliente as descripcion,  (select estado from ordenesTrabajo_estados WHERE idOrdenTrabajo=ordenesTrabajo.idOrdenTrabajo 
		ORDER by ordenesTrabajo_estados.idEstadoOrden desc LIMIT 1) as estado FROM `ordenesTrabajo` WHERE idCliente='$idCliente')
		 UNION all 
		(SELECT t.idOrdenCobro as idElemento,'Cobro' as tipo, t.fechaOrdenCobro as fecha, GROUP_CONCAT('Pago de las facturas ',facturasSalientes.numeroFactura,' con un importe de ',CAST(ordenesCobroFacturas.importeCobroFactura AS CHAR) ) as detalle, 'Pagado' as estado FROM `ordenesCobro` t
LEFT JOIN ordenesCobroFacturas on ordenesCobroFacturas.idOrdenCobro = t.idOrdenCobro 
LEFT JOIN facturasSalientes on facturasSalientes.idFacturaSaliente = ordenesCobroFacturas.idFacturaSaliente
WHERE t.idCliente='$idCliente' 
GROUP BY t.idOrdenCobro)
		UNION all 
		(SELECT t.idTarea as idElemento, 'Tareas' as tipo, t.fechaTarea as fecha, t.descripcionTarea as detalle, t.estadoTarea as estado FROM `tareas` t WHERE idClienteTarea='$idCliente') ORDER BY fecha desc";
        $command=$connection->createCommand($sql);
            
            return $command->queryAll();
	}
        public function consultarEtiquetasMail($nombre)
	{
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand(
"(SELECT concat(t.nombre,' ',t.apellido,' ',t.razonSocial) as cliente, t.email, 'General' as tipo
FROM `clientes` t

WHERE (t.nombre like '%$nombre%' OR t.apellido like '%$nombre%' OR t.razonSocial like '%$nombre%' OR t.nombreFantasia like '%$nombre%')
AND t.email<>'')
UNION

(SELECT t.nombresContactoFinanzas as cliente, t.emailContactoFinanzas as email, 'Finanzas' as tipo
FROM `clientes` t

WHERE (t.nombre like '%$nombre%' OR t.apellido like '%$nombre%' OR t.razonSocial like '%$nombre%' OR t.nombreFantasia like '%$nombre%')
AND t.emailContactoFinanzas<>'')

UNION

(SELECT t.nombresContactoMantenimiento as cliente, t.emailContactoMantenimiento as email, 'Mantenimiento' as tipo
FROM `clientes` t

WHERE (t.nombre like '%$nombre%' OR t.apellido like '%$nombre%' OR t.razonSocial like '%$nombre%' OR t.nombreFantasia like '%$nombre%')
AND t.emailContactoMantenimiento<>'') 
                UNION

(SELECT t.nombre as cliente, t.email as email, 'Usuario Sistema' as tipo
FROM `usuarios` t

WHERE (t.nombre like '%$nombre%' OR t.email like '%$nombre%')
AND t.email<>'') ORDER BY cliente
                
                
");
            
            return $command->queryAll();
	}
	public function consultarEtiquetas($nombre)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$this->nombre=$nombre;
		$this->apellido=$nombre;

		$criteria->compare('nombre',$this->nombre,true,'OR');
		$criteria->compare('apellido',$this->nombre,true,'OR');
		$criteria->compare('razonSocial',$this->nombre,true,'OR');
		$criteria->compare('nombreFantasia',$this->nombre,true,'OR');
		$criteria->compare('idCliente',$this->nombre,true,'OR');
		$criteria->order = "cliente asc";
		$criteria->select = "t.*, CONCAT(t.apellido,' ',t.nombre,' ',t.razonSocial) as cliente";

		return self::model()->findAll($criteria);
	}
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		'juridicciones'=>array(self::HAS_ONE, 'Juridicciones', 'idJuridiccion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCliente' => 'Id Cliente',
			'nombre' => 'Nombre',
			'apellido' => 'Apellido y Nombre',
			'razonSocial' => 'Razon Social',
			'direccion' => 'Calle',
			'telefono' => 'Telefono',
			'celular' => 'Celular',
			'nombreFantasia' => 'Nombre Fantasia',
			'email' => 'Email',
			'cuit' => 'Cuit',
			'condicionIva' => 'Condicion Iva',
			'condicionVenta' => 'Condicion Venta',
			'codCliente' => 'Cod Cliente',
			'nombreJuridiccion' => 'nombreJuridiccion',
		'juridicciones.nombreJuridiccion' => 'nombreJuridiccion',
			'idJuridiccion' => 'Juridiccion',
			'localidad' => 'Localidad',
			'limiteCredito' => 'Limite Credito',
			'fechaAlta' => 'Fecha Alta',
			'nro' => 'Nro',
                    'nombresContactoMantenimiento' => 'Nombres',
                     'emailContactoMantenimiento' => 'Email',
                     'mobilContactoMantenimiento' => 'Movil',
                    
                    'nombresContactoFinanzas' => 'Nombres',
                     'emailContactoFinanzas' => 'Email',
                     'mobilContactoMantenimiento' => 'Movil',
		'letraHabitual' => 'Letra Habitual',
		);
	}


	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
	
		$criteria->compare('idCliente',$this->idCliente);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('razonSocial',$this->razonSocial,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('nombreFantasia',$this->nombreFantasia,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('cuit',$this->cuit,true);
		$criteria->compare('condicionIva',$this->condicionIva,true);
		$criteria->compare('condicionVenta',$this->condicionVenta,true);
		$criteria->compare('codCliente',$this->codCliente,true);
		$criteria->compare('idJuridiccion',$this->idJuridiccion,true);
		$criteria->compare('localidad',$this->localidad,true);
		$criteria->compare('limiteCredito',$this->limiteCredito,true);
		$criteria->compare('fechaAlta',$this->fechaAlta,true);
		$criteria->compare('nro',$this->nro,true);

	if(isset($_GET['nombre']) && trim($_GET['nombre'])!="")
		{ 
			$criteria->compare('t.razonSocial',$_GET['nombre'],true); // That didn't work
			$criteria->compare('t.apellido',$_GET['nombre'],true,"OR"); // That didn't work
			$criteria->compare('t.nombre',$_GET['nombre'],true,"OR"); // That didn't work
			$criteria->compare('t.nombreFantasia',$_GET['nombre'],true,"OR"); // That didn't wor
		}
		
		$criteria->select = "t.*,CONCAT(t.apellido,' ',t.nombre,' ',t.razonSocial) as cliente,CONCAT(t.cuit,' ',t.condicionIva) as condicionIvaCuit,
		CONCAT(t.telefono,' / ',t.celular) as comunicacion, juridicciones.nombreJuridiccion as  nombreJuridiccion ";
		$criteria->join = " LEFT JOIN juridicciones on juridicciones.idJuridiccion = t.idJuridiccion ";
		$criteria->order="CONCAT(REPLACE(CONCAT(t.apellido,' '),' ',''),REPLACE(CONCAT(t.nombre,' '),' ',''),REPLACE(CONCAT(t.razonSocial,' '),' ','')) asc";
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
        public function consultarSaldo()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
	

	if(isset($_GET['nombre']) && trim($_GET['nombre'])!="")
		{ 
			$criteria->compare('t.razonSocial',$_GET['nombre'],true); // That didn't work
			$criteria->compare('t.apellido',$_GET['nombre'],true,"OR"); // That didn't work
			$criteria->compare('t.nombre',$_GET['nombre'],true,"OR"); // That didn't work
			$criteria->compare('t.nombreFantasia',$_GET['nombre'],true,"OR"); // That didn't wor
		}
		
		$criteria->select = "t.*,SUM(facturasSalientes_view.importeFactura) as saldo,sum(facturasSalientes_view.pagos) as pago,CONCAT(t.apellido,' ',t.razonSocial) as cliente,CONCAT(t.cuit,' ',t.condicionIva) as condicionIvaCuit,
		CONCAT(t.telefono,' / ',t.celular) as comunicacion,(SELECT sum(importeAcuenta) FROM ordenesCobro WHERE idCliente = t.idCliente AND estadoOrden IS NULL) as aCuenta ";
		$criteria->join = " LEFT JOIN facturasSalientes_view on facturasSalientes_view.idCliente = t.idCliente ";
		$criteria->group='t.idCliente';
                $criteria->compare('facturasSalientes_view.estado','PEND',false);
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}