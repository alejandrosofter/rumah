<?php

/**
 * This is the model class for table "tareas_coordinaciones".
 *
 * The followings are the available columns in table 'tareas_coordinaciones':
 * @property integer $idTareasCoordinaciones
 * @property integer $idTarea
 * @property integer $idEvento
 * @property integer $idCalendario
 * @property string $comentario
 */
class TareasCoordinaciones extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TareasCoordinaciones the static model class
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
		return 'tareas_coordinaciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
//			array('idTarea, idEvento, idCalendario, comentario', 'required'),
			array('idTarea, idEvento, idCalendario', 'numerical', 'integerOnly'=>true),
			array('comentario', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idTareasCoordinaciones, idTarea, idEvento, idCalendario, comentario', 'safe', 'on'=>'search'),
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
			'idTareasCoordinaciones' => 'Id Tareas Coordinaciones',
			'idTarea' => 'Id Tarea',
			'idEvento' => 'Id Evento',
			'idCalendario' => 'Id Calendario',
			'comentario' => 'Comentario',
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

		$criteria->compare('idTareasCoordinaciones',$this->idTareasCoordinaciones);
		$criteria->compare('idTarea',$this->idTarea);
		$criteria->compare('idEvento',$this->idEvento);
		$criteria->compare('idCalendario',$this->idCalendario);
		$criteria->compare('comentario',$this->comentario,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}