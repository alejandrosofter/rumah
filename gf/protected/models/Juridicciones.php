<?php

/**
 * This is the model class for table "juridicciones".
 *
 * The followings are the available columns in table 'juridicciones':
 * @property integer $idJuridiccion
 * @property string $nombreJuridiccion
 * @property string $codigoJuridiccion
 */
class Juridicciones extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Juridicciones the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function behaviors()
	{
    	return array(
        	'LoggableBehavior'=>
            	'application.modules.auditTrail.behaviors.LoggableBehavior',
    	);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'juridicciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombreJuridiccion, codigoJuridiccion', 'required'),
			array('nombreJuridiccion, codigoJuridiccion', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idJuridiccion, nombreJuridiccion, codigoJuridiccion', 'safe', 'on'=>'search'),
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
			'idJuridiccion' => 'Id Jurisdiccion',
			'nombreJuridiccion' => 'Nombre Jurisdiccion',
			'codigoJuridiccion' => 'Codigo Jurisdiccion',
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

		$criteria->compare('idJuridiccion',$this->idJuridiccion);
		$criteria->compare('nombreJuridiccion',$this->nombreJuridiccion,true);
		$criteria->compare('codigoJuridiccion',$this->codigoJuridiccion,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	

}