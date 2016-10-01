<?php

/**
 * This is the model class for table "cheques_estados".
 *
 * The followings are the available columns in table 'cheques_estados':
 * @property integer $idEstadoCheque
 * @property integer $idCheque
 * @property string $fecha
 * @property string $nombreEstado
 *
 * The followings are the available model relations:
 * @property Cheques $idCheque0
 */
class ChequesEstados extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ChequesEstados the static model class
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
		return 'cheques_estados';
	}
	public function getEstados()
	{
    	return array('A cobrar' => 'A cobrar', 'Cobrado' => 'Cobrado', 'Rechazado' => 'Rechazado');
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idCheque, fecha, nombreEstado', 'required'),
			array('idCheque', 'numerical', 'integerOnly'=>true),
			array('nombreEstado', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idEstadoCheque, idCheque, fecha, nombreEstado', 'safe', 'on'=>'search'),
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
			'idCheque0' => array(self::BELONGS_TO, 'Cheques', 'idCheque'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idEstadoCheque' => 'Id Estado Cheque',
			'idCheque' => 'Id Cheque',
			'fecha' => 'Fecha',
			'nombreEstado' => 'Nombre Estado',
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

		$criteria->compare('idEstadoCheque',$this->idEstadoCheque);
		$criteria->compare('idCheque',$this->idCheque);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('nombreEstado',$this->nombreEstado,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}