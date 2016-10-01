<?php

/**
 * This is the model class for table "usuarios_areas".
 *
 * The followings are the available columns in table 'usuarios_areas':
 * @property integer $idUsuarioArea
 * @property string $nombreArea
 * @property integer $centroCosto
 */
class UsuariosAreas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return UsuariosAreas the static model class
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
		return 'usuarios_areas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombreArea, centroCosto', 'required'),
			array('centroCosto', 'numerical', 'integerOnly'=>true),
			array('nombreArea', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idUsuarioArea, nombreArea, centroCosto', 'safe', 'on'=>'search'),
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
			'idUsuarioArea' => 'Id Usuario Area',
			'nombreArea' => 'Nombre Area',
			'centroCosto' => 'Centro Costo',
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

		$criteria->compare('idUsuarioArea',$this->idUsuarioArea);
		$criteria->compare('nombreArea',$this->nombreArea,true);
		$criteria->compare('centroCosto',$this->centroCosto);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}