<?php

/**
 * This is the model class for table "movimientos".
 *
 * The followings are the available columns in table 'movimientos':
 * @property integer $idMovimiento
 * @property integer $idUsuario
 * @property string $fecha
 * @property string $tipoMovimiento
 * @property string $tabla
 * @property integer $idElemento
 */
class Movimientos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Movimientos the static model class
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
		return 'movimientos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idMovimiento, idUsuario, fecha, tipoMovimiento, tabla, idElemento', 'required'),
			array('idMovimiento, idUsuario, idElemento', 'numerical', 'integerOnly'=>true),
			array('tipoMovimiento, tabla', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idMovimiento, idUsuario, fecha, tipoMovimiento, tabla, idElemento', 'safe', 'on'=>'search'),
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
			'idMovimiento' => 'Id Movimiento',
			'idUsuario' => 'Id Usuario',
			'fecha' => 'Fecha',
			'tipoMovimiento' => 'Tipo Movimiento',
			'tabla' => 'Tabla',
			'idElemento' => 'Id Elemento',
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

		$criteria->compare('idMovimiento',$this->idMovimiento);
		$criteria->compare('idUsuario',$this->idUsuario);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('tipoMovimiento',$this->tipoMovimiento,true);
		$criteria->compare('tabla',$this->tabla,true);
		$criteria->compare('idElemento',$this->idElemento);
		$criteria->order="fecha desc";
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'pagination'=>array(
        'pageSize'=>15)
		));
	}
}