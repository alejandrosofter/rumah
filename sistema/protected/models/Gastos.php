<?php

/**
 * This is the model class for table "gastos".
 *
 * The followings are the available columns in table 'gastos':
 * @property integer $idGasto
 * @property integer $idProveedor
 * @property string $fecha
 * @property string $detalle
 * @property double $importe
 * @property string $formaPago
 * @property integer $idCuentaEfectivo
 */
class Gastos extends CActiveRecord
{
	public $nombreProveedor;
	public $asociaciones;
	public $idCuenta;
	public $idFacturaEntrante;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Gastos the static model class
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
		return 'gastos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('detalle, idProveedor, importe, formaPago, idCuenta,idCuentaEfectivo, fecha', 'required'),
			array('idProveedor, idCuentaEfectivo', 'numerical', 'integerOnly'=>true),
			array('importe', 'numerical'),
			array('formaPago', 'length', 'max'=>20),
			//array('fecha', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idGasto, idProveedor, fecha, detalle, importe, formaPago, idCuentaEfectivo, proveedores.nombre', 'safe', 'on'=>'search'),
		);
	}
	public function cambiarEstado($idFactura,$estado)
	{
		$factura = FacturasEntrantes::model()->findByPk($idFactura);
        $factura->estado = $estado; 
        $factura->save();
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		'proveedores' => array(self::BELONGS_TO, 'Proveedores', 'idProveedor'),
                
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	
	public function attributeLabels()
	{
		return array(
			'idGasto' => 'Id Gasto',
			'idProveedor' => 'Proveedor',
			'fecha' => 'Fecha',
			'detalle' => 'Detalle',
			'importe' => 'Importe',
			'formaPago' => 'Forma Pago',
			'idCuentaEfectivo' => 'Cuenta Efectivo',
			'idCuenta' => 'Cuenta Contable',
			'asociaciones' => 'Factura',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function getFormaPagos()
	{
    	return array('Efectivo' => 'Efectivo', 'Cheque' => 'Cheque', 'Tarjeta' => 'Tarjeta', 'Debito' => 'Debito');
	}
	public function consultarGastosFactura($idFactura)
	{
		$criteria=new CDbCriteria;
		
		$sort = new CSort;
        $sort->defaultOrder = 't.idGasto desc';
        $criteria->compare('gastos_factura.idFacturaSaliente',$idFactura,true);
        
        if(isset($_GET['nombre']) && trim($_GET['nombre'])!="")
		$criteria->compare('proveedores.nombre',$_GET['nombre'],true); // That didn't work

		$criteria->select = "t.*, proveedores.nombre as nombreProveedor";
		$criteria->join = "LEFT JOIN proveedores on proveedores.idProveedor = t.idProveedor ".
		$criteria->join = "LEFT JOIN gastos_factura on gastos_factura.idGasto = t.idGasto ".
		$criteria->join = "LEFT JOIN gastos on gastos.idGasto = t.idGasto ";

		
return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria, 'sort' => $sort,
		));
	}
	public function consultarPorFecha($fechaInicio,$fechaFin)
	{
		$criteria=new CDbCriteria;
		
		$sort = new CSort;
        $sort->defaultOrder = 'idGasto desc';

		$criteria->compare('idGasto',$this->idGasto);
		$criteria->compare('idProveedor',$this->idProveedor);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->condition="fecha between '$fechaInicio' and '$fechaFin'";
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('importe',$this->importe);
		$criteria->compare('formaPago',$this->formaPago,true);
		$criteria->compare('idCuentaEfectivo',$this->idCuentaEfectivo);
		$criteria->select = "t.*,sum(t.importe) as importe,  proveedores.nombre as nombreProveedor ";
		$criteria->join = "LEFT JOIN proveedores on proveedores.idProveedor = t.idProveedor ";
						  
		$criteria->group='t.fecha';

		return Gastos::model()->findAll($criteria);
	//	return $res->getData();
	}
	public function search()
	{
		$criteria=new CDbCriteria;
		
		$sort = new CSort;
        $sort->defaultOrder = 'idGasto desc';

		$criteria->compare('idGasto',$this->idGasto);
		$criteria->compare('idProveedor',$this->idProveedor);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('importe',$this->importe);
		$criteria->compare('formaPago',$this->formaPago,true);
		$criteria->compare('idCuentaEfectivo',$this->idCuentaEfectivo);
		
		if(isset($_GET['nombre']) && trim($_GET['nombre'])!="")
		$criteria->compare('proveedores.nombre',$_GET['nombre'],true); // That didn't work
		
		$criteria->select = "t.*,gastos_factura.idFacturaSaliente as idFacturaEntrante, count(gastos_factura.idGasto) as asociaciones, proveedores.nombre as nombreProveedor ";
		$criteria->join = "LEFT JOIN proveedores on proveedores.idProveedor = t.idProveedor ".
						  "LEFT JOIN gastos_factura on gastos_factura.idGasto = t.idGasto ";
		$criteria->group='t.idGasto';

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria, 'sort' => $sort,
		));
	//	return $res->getData();
	}
}