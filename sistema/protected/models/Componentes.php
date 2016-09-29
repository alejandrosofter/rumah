<?php

/**
 * This is the model class for table "componentes".
 *
 * The followings are the available columns in table 'componentes':
 * @property integer $idComponente
 * @property integer $idStock
 *
 * The followings are the available model relations:
 * @property Stock $idStock0
 */
class Componentes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Componentes the static model class
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
		return 'componentes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idStock', 'required'),
			array('idStock', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idComponente, idStock', 'safe', 'on'=>'search'),
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
			'idStock0' => array(self::BELONGS_TO, 'Stock', 'idStock'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idComponente' => 'Id Componente',
			'idStock' => 'Id Stock',
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

		$criteria->compare('idComponente',$this->idComponente);
		$criteria->compare('idStock',$this->idStock);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}