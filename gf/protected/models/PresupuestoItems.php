<?php

/**
 * This is the model class for table "presupuestoItems".
 *
 * The followings are the available columns in table 'presupuestoItems':
 * @property integer $idItemPresupuesto
 * @property integer $idPresupuesto
 * @property integer $idStock
 * @property double $precioVenta
 * @property string $nombreStock
 * @property integer $cantidadItems
 * @property double $porcentajeIva
 */
class PresupuestoItems extends CActiveRecord
{
	public $tipoImporte;
	public $importeItemLista;
	public $importeItemMinimo;
	public $importeItemSinIva;
	public $importeItem;
	public $bonificado;
	/**
	 * Returns the static model of the specified AR class.
	 * @return PresupuestoItems the static model class
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
		return 'presupuestoItems';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' tipoImporte, precioVenta, nombreStock, cantidadItems, porcentajeIva', 'required'),
			array(' idStock, cantidadItems', 'numerical', 'integerOnly'=>true),
			array('precioVenta,importeItemMinimo,importeItem, importeItemSinIva, porcentajeIva', 'numerical'),
			array('nombreStock', 'length', 'max'=>180),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array(' idStock, precioVenta, nombreStock, cantidadItems, porcentajeIva', 'safe', 'on'=>'search'),
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
			'idItemPresupuesto' => 'Id Item Presupuesto',
			'idPresupuesto' => 'Id Presupuesto',
			'idStock' => 'Id Stock',
			'precioVenta' => 'Precio Venta',
			'nombreStock' => 'Producto/Servicio',
			'cantidadItems' => 'Cantidad',
			'porcentajeIva' => 'Porcentaje Iva',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function consultarItems($idPresupuesto)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idPresupuesto',$idPresupuesto);
	
		$criteria->select = "t.*";
		

		return self::model()->findAll($criteria);
	
	}
        public function search($idPresupuesto)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idItemPresupuesto',$this->idItemPresupuesto);
		$criteria->compare('idPresupuesto',$idPresupuesto);
		$criteria->compare('idStock',$this->idStock);
		$criteria->compare('precioVenta',$this->precioVenta);
		$criteria->compare('nombreStock',$this->nombreStock,true);
		$criteria->compare('cantidadItems',$this->cantidadItems);
		$criteria->compare('porcentajeIva',$this->porcentajeIva);
		
		$criteria->select = "t.*";
		

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}