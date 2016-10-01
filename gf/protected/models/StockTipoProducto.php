<?php

/**
 * This is the model class for table "stock_tipoProducto".
 *
 * The followings are the available columns in table 'stock_tipoProducto':
 * @property integer $idStockTipo
 * @property integer $nombre
 */
class StockTipoProducto extends CActiveRecord
{
	public $porcentajeGananciaLista;
	public $porcentajeGananciaMin;
	public $formulaPrecios;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return StockTipoProducto the static model class
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
		return 'stock_tipoProducto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre,porcentajeGananciaLista,porcentajeGananciaMin', 'required'),
			//array('nombre', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idStockTipo, nombre', 'safe', 'on'=>'search'),
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
			'idStockTipo' => 'Id Stock Tipo',
			'nombre' => 'Nombre',
			'porcentajeGananciaLista'=>'% Ganancia LISTA',
			'porcentajeGananciaMin'=>'% Ganancia MIN'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$sort = new CSort;
        $sort->defaultOrder = 'nombre asc';
        
		$criteria=new CDbCriteria;

		$criteria->compare('idStockTipo',$this->idStockTipo);
		$criteria->compare('nombre',$this->nombre);
		
		if(isset($_GET['nombre']) && trim($_GET['nombre'])!="")
		$criteria->compare('nombre',$_GET['nombre'],true); // That didn't work

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort
		));
	}
}