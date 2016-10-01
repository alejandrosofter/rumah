<?php

/**
 * This is the model class for table "reloj_tipoTurnos".
 *
 * The followings are the available columns in table 'reloj_tipoTurnos':
 * @property integer $idTipoTurno
 * @property string $nombreTurno
 */
class RelojTipoTurnos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RelojTipoTurnos the static model class
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
		return 'reloj_tipoTurnos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombreTurno', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idTipoTurno, nombreTurno', 'safe', 'on'=>'search'),
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
			'idTipoTurno' => 'Tipo Turno',
			'nombreTurno' => 'Nombre Turno',
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

		$criteria->compare('idTipoTurno',$this->idTipoTurno);
		$criteria->compare('nombreTurno',$this->nombreTurno,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}