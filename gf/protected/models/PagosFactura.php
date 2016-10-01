<?php

/**
 * This is the model class for table "pagosFactura".
 *
 * The followings are the available columns in table 'pagosFactura':
 * @property integer $idPagoFactura
 * @property integer $idFacturaSaliente
 * @property integer $idPago
 * @property string $estadoPagoFactura
 *
 * The followings are the available model relations:
 * @property FacturasSalientes $idFacturaSaliente0
 * @property Pagos $idPago0
 */
class PagosFactura extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return PagosFactura the static model class
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
		return 'pagosFactura';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idFacturaSaliente, idPago, estadoPagoFactura', 'required'),
			array('idFacturaSaliente, idPago', 'numerical', 'integerOnly'=>true),
			array('estadoPagoFactura', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPagoFactura, idFacturaSaliente, idPago, estadoPagoFactura', 'safe', 'on'=>'search'),
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
			'idFacturaSaliente0' => array(self::BELONGS_TO, 'FacturasSalientes', 'idFacturaSaliente'),
			'idPago0' => array(self::BELONGS_TO, 'Pagos', 'idPago'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPagoFactura' => 'Id Pago Factura',
			'idFacturaSaliente' => 'Factura de Venta',
			'idPago' => 'Pago',
			'estadoPagoFactura' => 'Estado Factura',
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

		$criteria->compare('idPagoFactura',$this->idPagoFactura);
		$criteria->compare('idFacturaSaliente',$this->idFacturaSaliente);
		$criteria->compare('idPago',$this->idPago);
		$criteria->compare('estadoPagoFactura',$this->estadoPagoFactura,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'pagination'=>array(
        'pageSize'=>2000,),
		));
	}
}