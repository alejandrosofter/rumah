<?php

/**
 * This is the model class for table "itemsPedido".
 *
 * The followings are the available columns in table 'itemsPedido':
 * @property integer $idItemPedido
 * @property string $nombreItem
 * @property double $precioCompra
 * @property double $precioVenta
 * @property double $porecentajeIva
 * @property integer $idStock
 * @property integer $idPedido
 * @property integer $cantidad
 */
class ItemsPedido extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ItemsPedido the static model class
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
		return 'itemsPedido';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombreItem, precioCompra, precioVenta, porecentajeIva, idStock, idPedido, cantidad', 'required'),
			array('idStock, idPedido, cantidad', 'numerical', 'integerOnly'=>true),
			array('precioCompra, precioVenta, porecentajeIva', 'numerical'),
			array('nombreItem', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idItemPedido, nombreItem, precioCompra, precioVenta, porecentajeIva, idStock, idPedido, cantidad', 'safe', 'on'=>'search'),
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
			'idItemPedido' => 'Id Item Pedido',
			'nombreItem' => 'Nombre Item',
			'precioCompra' => 'Precio Compra',
			'precioVenta' => 'Precio Venta',
			'porecentajeIva' => 'Porecentaje Iva',
			'idStock' => 'Id Stock',
			'idPedido' => 'Id Pedido',
			'cantidad' => 'Cantidad',
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

		$criteria->compare('idItemPedido',$this->idItemPedido);
		$criteria->compare('nombreItem',$this->nombreItem,true);
		$criteria->compare('precioCompra',$this->precioCompra);
		$criteria->compare('precioVenta',$this->precioVenta);
		$criteria->compare('porecentajeIva',$this->porecentajeIva);
		$criteria->compare('idStock',$this->idStock);
		$criteria->compare('idPedido',$this->idPedido);
		$criteria->compare('cantidad',$this->cantidad);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}