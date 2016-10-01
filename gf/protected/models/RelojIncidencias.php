<?php

/**
 * This is the model class for table "reloj_Incidencias".
 *
 * The followings are the available columns in table 'reloj_Incidencias':
 * @property integer $id
 * @property integer $idEmpleado
 * @property string $fechaInicio
 * @property string $fechaFin
 * @property integer $idMotivos
 */
class RelojIncidencias extends CActiveRecord
{
	public $nombreEmpleado;
        public $nombreMotivo;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RelojIncidencias the static model class
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
		return 'reloj_Incidencias';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idEmpleado, idMotivos', 'numerical', 'integerOnly'=>true),
			array('fechaInicio, fechaFin', 'safe'),
                    array('fechaInicio, fechaFin, idEmpleado,idMotivos', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, idEmpleado, fechaInicio, fechaFin, idMotivos', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'idEmpleado' => 'Empleado',
			'fechaInicio' => 'Fecha Inicio',
			'fechaFin' => 'Fecha Fin',
			'idMotivos' => 'Motivos',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('idEmpleado',$this->idEmpleado);
		$criteria->compare('fechaInicio',$this->fechaInicio,true);
		$criteria->compare('fechaFin',$this->fechaFin,true);
		$criteria->compare('idMotivos',$this->idMotivos);
                $criteria->join="left join reloj_empleados on reloj_empleados.idEmpleado = t.idEmpleado 
                    left join reloj_motivos on reloj_motivos.id = t.idMotivos";
                $criteria->select="t.*,reloj_motivos.nombre as nombreMotivo, reloj_empleados.nombreEmpleado";

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}