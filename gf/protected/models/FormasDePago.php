<?php

/**
 * This is the model class for table "formasDePago".
 *
 * The followings are the available columns in table 'formasDePago':
 * @property integer $idFormaPago
 * @property string $nombreForma
 * @property string $tipoForma
 * @property integer $cantidadCuotas
 * @property double $intereses
 * @property integer $ingresoEgreso
 */
class FormasDePago extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FormasDePago the static model class
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
		return 'formasDePago';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombreForma', 'required'),
			array('cantidadCuotas, ingresoEgreso', 'numerical', 'integerOnly'=>true),
			array('intereses', 'numerical'),
			array('nombreForma, tipoForma', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idFormaPago, nombreForma, tipoForma, cantidadCuotas, intereses, ingresoEgreso', 'safe', 'on'=>'search'),
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
			'idFormaPago' => 'Id Forma Pago',
			'nombreForma' => 'Nombre Forma',
			'tipoForma' => 'Tipo Forma',
			'cantidadCuotas' => 'Cantidad Cuotas',
			'intereses' => 'Intereses',
			'ingresoEgreso' => 'Ingreso Egreso',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function getTipos()
	{
    	return array('Debito' => 'Debito', 'Credito' => 'Credito', 'Efectivo' => 'Efectivo', 'Cheques' => 'Cheques');
	}
        public function getIngresoEgreso()
	{
    	return array('1' => 'Compras', '2' => 'Ventas');
	}
        public function buscar($tipo)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ingresoEgreso',$tipo);

		return self::model()->findAll($criteria
		);
	}
        public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idFormaPago',$this->idFormaPago);
		$criteria->compare('nombreForma',$this->nombreForma,true);
		$criteria->compare('tipoForma',$this->tipoForma,true);
		$criteria->compare('cantidadCuotas',$this->cantidadCuotas);
		$criteria->compare('intereses',$this->intereses);
		$criteria->compare('ingresoEgreso',$this->ingresoEgreso);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}