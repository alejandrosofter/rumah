<?php

/**
 * This is the model class for table "reloj_Feriados".
 *
 * The followings are the available columns in table 'reloj_Feriados':
 * @property integer $idFeriado
 * @property string $fechaFeriado
 * @property string $comentarioFeriado
 */
class RelojFeriados extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RelojFeriados the static model class
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
		return 'reloj_Feriados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('comentarioFeriado', 'length', 'max'=>255),
			array('fechaFeriado', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idFeriado, fechaFeriado, comentarioFeriado', 'safe', 'on'=>'search'),
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
			'idFeriado' => 'Feriado',
			'fechaFeriado' => 'Fecha Feriado',
			'comentarioFeriado' => 'Comentario Feriado',
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

		$criteria->compare('idFeriado',$this->idFeriado);
		$criteria->compare('fechaFeriado',$this->fechaFeriado,true);
		$criteria->compare('comentarioFeriado',$this->comentarioFeriado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}