<?php

/**
 * This is the model class for table "pagos".
 *
 * The followings are the available columns in table 'pagos':
 * @property integer $idPago
 * @property string $fecha
 * @property string $detalle
 * @property integer $idCliente
 * @property double $importeDinero
 * @property string $formaPago
 * @property integer $idCuentaEfectivo
 */
class Pagos extends CActiveRecord
{
//	public $nombreFactura;
	public $nombreCuenta;
	public $nombrePago;
	public $cliente;
	public $idCuentaVenta;
	public $idFacturaSaliente;
	public $nuevaFactura; //lo uso para ir directamente a imputar el pago
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pagos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pagos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('importeDinero, formaPago,idCuentaVenta, idCuentaEfectivo, idCliente, fecha', 'required'),
			array('idCliente, idCuentaEfectivo', 'numerical', 'integerOnly'=>true),
			array('importeDinero', 'numerical'),
			array('detalle', 'length', 'max'=>100),
			array('formaPago', 'length', 'max'=>20),
			array('fecha', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPago, fecha, detalle, idCliente, importeDinero, formaPago, idCuentaEfectivo', 'safe', 'on'=>'search'),
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
			'idPago' => 'Id Pago',
			'fecha' => 'Fecha',
			'detalle' => 'Detalle',
			'idCliente' => 'Cliente',
			'importeDinero' => '$ Importe',
			'formaPago' => 'Forma de Pago',
			'idCuentaEfectivo' => 'Cuenta Destino',
			'idCuentaVenta' => 'Cuenta Contable',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function getFormasPago()
	{
    	return array('Efectivo' => 'Efectivo', 'Tarjeta' => 'Tarjeta', 'Debito' => 'Debito', 'Cheques' => 'Cheques');
	}
	public function consultarPagos($idFactura)
	{
		$criteria=new CDbCriteria;
		$sort = new CSort;
		$sort->defaultOrder = 'idPago desc';
		$criteria->compare('pagosFactura.idFacturaSaliente',$idFactura);
		$criteria->select = "t.*,cuentasEfectivo.nombre as nombreCuenta";
		$criteria->join = "LEFT JOIN pagosFactura on pagosFactura.idPago = t.idPago ".
		"LEFT JOIN cuentasEfectivo on cuentasEfectivo.idCuentaEfectivo = t.idCuentaEfectivo ";
		$criteria->group='pagosFactura.idPagoFactura';
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort,
		));
	}
	public function consultarPagosCliente($idCliente)
	{
		$criteria=new CDbCriteria;
		$criteria->compare('idCliente',$idCliente);
		$criteria->select = "t.*,CONCAT('$ ',ROUND(t.importeDinero,2),' - ',
		cuentasEfectivo.nombre) as nombrePago,cuentasEfectivo.nombre as nombreCuenta";
		$criteria->join = "LEFT JOIN cuentasEfectivo on cuentasEfectivo.idCuentaEfectivo = t.idCuentaEfectivo ";
		$criteria->group='t.idPago';
		$sort = new CSort;
		$sort->defaultOrder = 'idPago desc';
		$res= new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort,'pagination'=>array(
        'pageSize'=>2000,),
		));
		return $res->getData();
	}
	public function consultarPorFecha($fechaInicio,$fechaFin)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$sort = new CSort;
        $sort->defaultOrder = 'idPago desc';
		
		$criteria->condition="fecha between '$fechaInicio' and '$fechaFin'";
		$criteria->select = "t.*,sum(t.importeDinero) as importeDinero, if(clientes.tipoCliente='Empresa',clientes.razonSocial,
		CONCAT(clientes.apellido,', ',clientes.nombre)) as cliente";
		$criteria->join = "LEFT JOIN clientes on clientes.idCliente = t.idCliente ";
		$criteria->group='t.fecha';

		return Pagos::model()->findAll($criteria);
	}
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$sort = new CSort;
        $sort->defaultOrder = 'idPago desc';

		$criteria->compare('idPago',$this->idPago);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('idCliente',$this->idCliente);
		$criteria->compare('importeDinero',$this->importeDinero);
		$criteria->compare('formaPago',$this->formaPago,true);
		$criteria->compare('idCuentaEfectivo',$this->idCuentaEfectivo);
		
		if(isset($_GET['nombre']) && trim($_GET['nombre'])!="")
		{
			$criteria->compare('clientes.razonSocial',$_GET['nombre'],true); // That didn't work
			$criteria->compare('clientes.apellido',$_GET['nombre'],true,"OR"); // That didn't work
			$criteria->compare('clientes.nombre',$_GET['nombre'],true,"OR"); // That didn't work
			
		}
	if(isset($_GET['formaPago']) && trim($_GET['formaPago'])!="")
		{
			$criteria->compare('t.formaPago',$_GET['formaPago'],true); // That didn't work
		}
		
		

		
		$criteria->select = "t.*, if(clientes.tipoCliente='Empresa',clientes.razonSocial,
		CONCAT(clientes.apellido,', ',clientes.nombre)) as cliente";
		$criteria->join = "LEFT JOIN clientes on clientes.idCliente = t.idCliente ";
		$criteria->group='t.idPago';

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort
		));
	}
}