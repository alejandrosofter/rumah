<?php

/**
 * This is the model class for table "recepcion".
 *
 * The followings are the available columns in table 'recepcion':
 * @property integer $idRecepcion
 * @property integer $idCliente
 * @property string $descripcionRecepcion
 * @property string $fechaRecepcion
 * @property string $tipoRecepcion
 * @property integer $idRecepcionPadre
 * @property string $estadoRecepcion
 */
class Recepcion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Recepcion the static model class
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
		return 'recepcion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idCliente, descripcionRecepcion, fechaRecepcion, tipoRecepcion, idRecepcionPadre, estadoRecepcion', 'required'),
			array('idCliente, idRecepcionPadre', 'numerical', 'integerOnly'=>true),
			array('tipoRecepcion, estadoRecepcion', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idRecepcion, idCliente, descripcionRecepcion, fechaRecepcion, tipoRecepcion, idRecepcionPadre, estadoRecepcion', 'safe', 'on'=>'search'),
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
			'idRecepcion' => 'Id Recepcion',
			'idCliente' => 'Id Cliente',
			'descripcionRecepcion' => 'Descripcion Recepcion',
			'fechaRecepcion' => 'Fecha Recepcion',
			'tipoRecepcion' => 'Tipo Recepcion',
			'idRecepcionPadre' => 'Id Recepcion Padre',
			'estadoRecepcion' => 'Estado Recepcion',
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

		$criteria->compare('idRecepcion',$this->idRecepcion);
		$criteria->compare('idCliente',$this->idCliente);
		$criteria->compare('descripcionRecepcion',$this->descripcionRecepcion,true);
		$criteria->compare('fechaRecepcion',$this->fechaRecepcion,true);
		$criteria->compare('tipoRecepcion',$this->tipoRecepcion,true);
		$criteria->compare('idRecepcionPadre',$this->idRecepcionPadre);
		$criteria->compare('estadoRecepcion',$this->estadoRecepcion,true);
		$criteria->order = "idRecepcion desc";

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}