<?php

/**
 * This is the model class for table "cuentas".
 *
 * The followings are the available columns in table 'cuentas':
 * @property integer $idCuenta
 * @property string $nombre
 * @property integer $idCentroCosto
 */
class Cuentas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Cuentas the static model class
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
		return 'cuentas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, idCentroCosto', 'required'),
			array('idCentroCosto', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idCuenta, nombre, idCentroCosto', 'safe', 'on'=>'search'),
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
			'idCuenta' => 'Id Cuenta',
			'nombre' => 'Nombre',
			'idCentroCosto' => 'Centro Costo',
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

		$criteria->compare('idCuenta',$this->idCuenta);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('idCentroCosto',$this->idCentroCosto);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}