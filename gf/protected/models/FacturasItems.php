<?php

/**
 * This is the model class for table "facturas_items".
 *
 * The followings are the available columns in table 'facturas_items':
 * @property integer $id
 * @property integer $idFactura
 * @property integer $idProducto
 * @property string $detalle
 * @property double $importe
 * @property integer $cantidad
 * @property double $total
 * @property double $interes
 * @property double $descuentos
 *
 * The followings are the available model relations:
 * @property Facturas $idFactura0
 * @property Stock $idProducto0
 */
class FacturasItems extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FacturasItems the static model class
	 */
	 public $buscar;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'facturas_items';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idFactura, idProducto', 'required'),
			array('idFactura, idProducto, cantidad', 'numerical', 'integerOnly'=>true),
			array('importe, total, interes, descuentos', 'numerical'),
			array('detalle', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('buscar,id, idFactura, idProducto, detalle, importe, cantidad, total, interes, descuentos', 'safe', 'on'=>'search'),
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
			'factura' => array(self::BELONGS_TO, 'Facturas', 'idFactura'),
			'producto' => array(self::BELONGS_TO, 'Stock', 'idProducto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'idFactura' => 'Id Factura',
			'idProducto' => 'Id Producto',
			'detalle' => 'Detalle',
			'importe' => 'Importe',
			'cantidad' => 'Cantidad',
			'total' => 'Total',
			'interes' => 'Interes',
			'descuentos' => 'Descuentos',
		);
	}

	public function ventasStock($idProducto)
	{
		$criteria=new CDbCriteria;
		$criteria->compare('idProducto',$idProducto,false);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('idFactura',$this->idFactura,false);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}