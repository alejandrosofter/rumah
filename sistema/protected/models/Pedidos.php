<?php

/**
 * This is the model class for table "pedidos".
 *
 * The followings are the available columns in table 'pedidos':
 * @property integer $idPedido
 * @property integer $idFacturaSaliente
 * @property string $fechaPedido
 * @property string $comentarioPedido
 * @property string $datos
 */
class Pedidos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pedidos the static model class
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
		return 'pedidos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idFacturaSaliente, fechaPedido, comentarioPedido, datos', 'required'),
			array('idFacturaSaliente', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPedido, idFacturaSaliente, fechaPedido, comentarioPedido, datos', 'safe', 'on'=>'search'),
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
			'idPedido' => 'Id Pedido',
			'idFacturaSaliente' => 'Id Factura Saliente',
			'fechaPedido' => 'Fecha Pedido',
			'comentarioPedido' => 'Comentario Pedido',
			'datos' => 'Datos',
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

		$criteria->compare('idPedido',$this->idPedido);
		$criteria->compare('idFacturaSaliente',$this->idFacturaSaliente);
		$criteria->compare('fechaPedido',$this->fechaPedido,true);
		$criteria->compare('comentarioPedido',$this->comentarioPedido,true);
		$criteria->compare('datos',$this->datos,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}