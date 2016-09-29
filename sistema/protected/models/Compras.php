<?php

/**
 * This is the model class for table "compras".
 *
 * The followings are the available columns in table 'compras':
 * @property integer $idCompra
 * @property string $fechaCompra
 * @property integer $idFacturaEntrante
 * @property string $descripcionCompra
 * @property double $importeDolar
 */
class Compras extends CActiveRecord
{
	public $cantidadProductos;
	public $cantidadProductosStock;
	public $formulaPrecios;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Compras the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function beforeDelete()
	{
		 parent::beforeDelete();
		 
$criteria=new CDbCriteria;
$criteria->select = ' * ';  // only select the 'title' column
$criteria->condition = ' idCompra=:idCompra ';
$criteria->params=array(':idCompra'=>$this->idCompra);
$items=ComprasItems::model()->findAll($criteria);


for($i=0;count($items)>$i;$i++)
{
	
$criteria=new CDbCriteria;
$criteria->select = ' * ';  // only select the 'title' column
$criteria->condition = ' idStock=:idStock ';
$criteria->params=array(':idStock'=>$items[$i]->idStock);
$criteria->order='t.idStockDisponible desc';
$disponibles=StockDisponible::model()->find($criteria);

	$disponibles->cantidadDisponible = $disponibles->cantidadDisponible - $items[$i]->cantidad;
	$disponibles->update();

}		 
			  return parent::beforeDelete();
}
	
	public function tableName()
	{
		return 'compras';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fechaCompra, idFacturaEntrante', 'required'),
			array('idFacturaEntrante', 'numerical', 'integerOnly'=>true),
			array('importeDolar', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idCompra, fechaCompra, idFacturaEntrante, descripcionCompra, importeDolar', 'safe', 'on'=>'search'),
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
			'idCompra' => 'Id Compra',
			'fechaCompra' => 'Fecha Compra',
			'idFacturaEntrante' => 'Factura de Compra',
			'descripcionCompra' => 'Descripción Compra',
			'importeDolar' => 'Importe Dolar ACTUAL',
			'cantidadProductos' => 'Productos',
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

		$criteria->compare('idCompra',$this->idCompra);
		$criteria->compare('fechaCompra',$this->fechaCompra,true);
		$criteria->compare('idFacturaEntrante',$this->idFacturaEntrante);
		$criteria->compare('descripcionCompra',$this->descripcionCompra,true);
		$criteria->compare('importeDolar',$this->importeDolar);
		
		$criteria->select = "t.*, COUNT(compras_items.idStock) as cantidadProductos ";
		$criteria->join = "LEFT JOIN compras_items on compras_items.idCompra = t.idCompra " .
				"INNER JOIN facturasEntrantes on facturasEntrantes.idFacturaEntrante = t.idFacturaEntrante";
		$criteria->order='t.idCompra desc';
		$criteria->group='t.idCompra';

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}