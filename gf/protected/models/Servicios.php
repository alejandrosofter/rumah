<?php

/**
 * This is the model class for table "stock".
 *
 * The followings are the available columns in table 'stock':
 * @property integer $idStock
 * @property string $nombre
 * @property string $detalle
 * @property string $estado
 * @property string $codigoBarra
 * @property double $porcentajeIva
 * @property integer $min
 * @property integer $max
 * @property string $tipoProducto
 * @property integer $idTipoProducto
 * @property integer $idCuenta
 */
class Servicios extends CActiveRecord
{
	public $precioLista;
	public $precioMinimo;
	public $nombreCuenta;
	public $importeSinIva;
	public $formulaPrecios;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Servicios the static model class
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
		return 'stock';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('detalle, nombre, estado, porcentajeIva, tipoProducto', 'required'),
			array('min, max, idTipoProducto', 'numerical', 'integerOnly'=>true),
			array('porcentajeIva', 'numerical'),
			
			array('estado', 'length', 'max'=>20),
			array('codigoBarra', 'length', 'max'=>60),
			array('tipoProducto', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idStock, nombre, detalle, estado, codigoBarra, porcentajeIva, min, max, tipoProducto, idTipoProducto, idCuenta', 'safe', 'on'=>'search'),
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
	public function behaviors()
	{
    	return array(
        	'LoggableBehavior'=>
            	'application.modules.auditTrail.behaviors.LoggableBehavior',
    	);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idStock' => 'Id Stock',
			'nombre' => 'Nombre',
			'detalle' => 'Detalle',
			'estado' => 'Estado',
			'codigoBarra' => 'Codigo Barra',
			'porcentajeIva' => 'Porcentaje Iva',
			'min' => 'Min',
			'max' => 'Max',
			'tipoProducto' => 'Tipo Producto',
			'idTipoProducto' => 'Tipo Producto',
			'idCuenta' => 'Cuenta',
			'nombreCuenta'=>'Cuenta',
			'idCuentaVenta' => 'Cuenta Contable',
			'idStockMarca' => 'Marca',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function consultarPorTipo($idtipo)
	{
		$criteria=new CDbCriteria;

		$criteria->compare('tipoProducto','SERVICIO',true);
		$criteria->compare('idCuenta',$idtipo);
		$criteria->select = "t.*, (SELECT importePesosStock FROM stock_precios_items WHERE stock_precios_items.idStock = t.idStock ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1) as precioLista,(SELECT importePesosStockMin FROM stock_precios_items WHERE stock_precios_items.idStock = t.idStock ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1) as precioMinimo ";

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idStock',$this->idStock);
		$criteria->compare('t.nombre',$this->nombre,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('codigoBarra',$this->codigoBarra,true);
		$criteria->compare('porcentajeIva',$this->porcentajeIva);
		$criteria->compare('min',$this->min);
		$criteria->compare('max',$this->max);
		$criteria->compare('tipoProducto','SERVICIO',true);
		$criteria->compare('idTipoProducto',$this->idTipoProducto);
		$criteria->compare('idCuenta',$this->idCuenta);
		$criteria->select = "t.*, cuentas.nombre as nombreCuenta,
                (SELECT importePesosStock FROM stock_precios_items WHERE stock_precios_items.idStock = t.idStock ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1)*((t.porcentajeIva/100)+1) as precioLista,
                (SELECT importePesosStock FROM stock_precios_items WHERE stock_precios_items.idStock = t.idStock ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1) as importeSinIva,
                (SELECT importePesosStockMin FROM stock_precios_items WHERE stock_precios_items.idStock = t.idStock ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1)*((t.porcentajeIva/100)+1) as precioMinimo";
		$criteria->join="LEFT JOIN cuentas on cuentas.idCuenta = t.idCuenta";

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}