<?php

/**
 * This is the model class for table "valorMoneda_tipos".
 *
 * The followings are the available columns in table 'valorMoneda_tipos':
 * @property integer $idValorMonedaTipo
 * @property string $nombreMoneda
 */
class ValorMonedaTipos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ValorMonedaTipos the static model class
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
		return 'valorMoneda_tipos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombreMoneda', 'required'),
			array('nombreMoneda', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idValorMonedaTipo, nombreMoneda', 'safe', 'on'=>'search'),
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
			'idValorMonedaTipo' => 'Id Valor Moneda Tipo',
			'nombreMoneda' => 'Nombre Moneda',
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

		$criteria->compare('idValorMonedaTipo',$this->idValorMonedaTipo);
		$criteria->compare('nombreMoneda',$this->nombreMoneda,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}