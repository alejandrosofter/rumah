<?php

/**
 * This is the model class for table "estadosRecepcion".
 *
 * The followings are the available columns in table 'estadosRecepcion':
 * @property integer $idEstadoRecepcion
 * @property integer $idRecepcion
 * @property string $fechaEstadoRecepcion
 * @property string $descripcionEstadoRecepcion
 * @property integer $idUsuarioEstado
 * @property string $estadoEstadoRecepcion
 */
class EstadosRecepcion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return EstadosRecepcion the static model class
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
		return 'estadosRecepcion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idRecepcion, fechaEstadoRecepcion, descripcionEstadoRecepcion, idUsuarioEstado, estadoEstadoRecepcion', 'required'),
			array('idRecepcion, idUsuarioEstado', 'numerical', 'integerOnly'=>true),
			array('estadoEstadoRecepcion', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idEstadoRecepcion, idRecepcion, fechaEstadoRecepcion, descripcionEstadoRecepcion, idUsuarioEstado, estadoEstadoRecepcion', 'safe', 'on'=>'search'),
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
			'idEstadoRecepcion' => 'Id Estado Recepcion',
			'idRecepcion' => 'Id Recepcion',
			'fechaEstadoRecepcion' => 'Fecha Estado Recepcion',
			'descripcionEstadoRecepcion' => 'Descripcion Estado Recepcion',
			'idUsuarioEstado' => 'Id Usuario Estado',
			'estadoEstadoRecepcion' => 'Estado Estado Recepcion',
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

		$criteria->compare('idEstadoRecepcion',$this->idEstadoRecepcion);
		$criteria->compare('idRecepcion',$this->idRecepcion);
		$criteria->compare('fechaEstadoRecepcion',$this->fechaEstadoRecepcion,true);
		$criteria->compare('descripcionEstadoRecepcion',$this->descripcionEstadoRecepcion,true);
		$criteria->compare('idUsuarioEstado',$this->idUsuarioEstado);
		$criteria->compare('estadoEstadoRecepcion',$this->estadoEstadoRecepcion,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}