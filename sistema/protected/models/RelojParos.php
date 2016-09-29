<?php

/**
 * This is the model class for table "reloj_Paros".
 *
 * The followings are the available columns in table 'reloj_Paros':
 * @property integer $idParo
 * @property string $fechaParo
 * @property string $comentarioParo
 */
class RelojParos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RelojParos the static model class
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
		return 'reloj_Paros';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('comentarioParo', 'length', 'max'=>255),
			array('fechaParo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idParo, fechaParo, comentarioParo', 'safe', 'on'=>'search'),
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
			'idParo' => 'Paro',
			'fechaParo' => 'Fecha Paro',
			'comentarioParo' => 'Comentario Paro',
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

		$criteria->compare('idParo',$this->idParo);
		$criteria->compare('fechaParo',$this->fechaParo,true);
		$criteria->compare('comentarioParo',$this->comentarioParo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}