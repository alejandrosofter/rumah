<?php

/**
 * This is the model class for table "stock_precios".
 *
 * The followings are the available columns in table 'stock_precios':
 * @property integer $idStockPrecio
 * @property string $fechaStock
 * @property integer $enServicios
 * @property string $tipo
 * @property integer $idTipo
 */
class StockPrecios extends CActiveRecord
{
	public $cantidadProductos;
	public $idElemento;
	public $formulaPrecios;
	/**
	 * Returns the static model of the specified AR class.
	 * @return StockPrecios the static model class
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
		return 'stock_precios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fechaStock, tipo,', 'required'),
			array('enServicios,idElemento, idTipo, porcentajeVariacion', 'numerical', 'integerOnly'=>true),
			array('tipo', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idStockPrecio, fechaStock, enServicios, tipo, idTipo', 'safe', 'on'=>'search'),
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
			'idStockPrecio' => 'Id Stock Precio',
			'fechaStock' => 'Fecha Asignación',
			'enServicios' => 'En Servicios',
			'tipo' => 'Tipo',
			'idTipo' => 'Asignación',
			'cantidadProductos'=>'Productos',
			'porcentajeVariacion'=>'% Variación'
		);
	}
	
	public function getTipos()
	{
    	return array('compra' => 'Compra', 'inventario' => 'Inventario', 'porTipo' => 'Tipo de Producto','servicios' => 'Servicios');
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
		$sort = new CSort;
        $sort->defaultOrder = 'idStockPrecio desc';

		$criteria->compare('enServicios',0);
		$criteria->select = "t.*, count(stock_precios_items.idStockPrecio) as cantidadProductos";
		$criteria->join = "LEFT JOIN stock_precios_items on stock_precios_items.idStockPrecio = t.idStockPrecio ";
		$criteria->group='t.idStockPrecio';

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort
		));
	}
	public function consultarServicios()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$sort = new CSort;
        $sort->defaultOrder = 'idStockPrecio desc';

		$criteria->compare('enServicios',1);
		$criteria->select = "t.*, count(stock_precios_items.idStockPrecio) as cantidadProductos";
		$criteria->join = "LEFT JOIN stock_precios_items on stock_precios_items.idStockPrecio = t.idStockPrecio ";
		$criteria->group='t.idStockPrecio';

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort
		));
	}
}