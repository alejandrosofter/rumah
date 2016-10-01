<?php

/**
 * This is the model class for table "alertas_usuario".
 *
 * The followings are the available columns in table 'alertas_usuario':
 * @property integer $idAlertaUsuario
 * @property integer $idAlerta
 * @property integer $idUsuario
 *
 * The followings are the available model relations:
 * @property Alertas $idAlerta0
 */
class AlertasUsuario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AlertasUsuario the static model class
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
		return 'alertas_usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idAlerta, idUsuario', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idAlertaUsuario, idAlerta, idUsuario', 'safe', 'on'=>'search'),
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
			'idAlerta0' => array(self::BELONGS_TO, 'Alertas', 'idAlerta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idAlertaUsuario' => 'Id Alerta Usuario',
			'idAlerta' => 'Id Alerta',
			'idUsuario' => 'Id Usuario',
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

		$criteria->compare('idAlertaUsuario',$this->idAlertaUsuario);
		$criteria->compare('idAlerta',$this->idAlerta);
		$criteria->compare('idUsuario',$this->idUsuario);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}