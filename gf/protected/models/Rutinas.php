<?php

/**
 * This is the model class for table "rutinas".
 *
 * The followings are the available columns in table 'rutinas':
 * @property integer $idRutina
 * @property integer $semana
 * @property string $nombreDia
 * @property integer $idDia
 * @property string $hora
 * @property integer $divisorSemana
 * @property string $horaIngreso
 * @property string $horaSalida
 * @property string $comentarioRutina
 *
 * The followings are the available model relations:
 * @property MantenimientosRutina[] $mantenimientosRutinas
 */
class Rutinas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rutinas the static model class
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
		return 'rutinas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('semana, nombreDia, idDia, hora, divisorSemana, horaIngreso, horaSalida, comentarioRutina', 'required'),
			array('semana, idDia, divisorSemana', 'numerical', 'integerOnly'=>true),
			array('nombreDia', 'length', 'max'=>50),
			array('comentarioRutina', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idRutina, semana, nombreDia, idDia, hora, divisorSemana, horaIngreso, horaSalida, comentarioRutina', 'safe', 'on'=>'search'),
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
			'manteminientosRutina' => array(self::BELONGS_TO, 'MantenimientosRutina', 'idRutina'),
           'mantenimientosEmpresas'=>array(self::HAS_ONE,'MantenimientosEmpresas','idMantenimientoEmpresa',
           									'through'=>'manteminientosRutina'),

       );

	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idRutina' => 'Id Rutina',
			'semana' => 'Semana',
			'nombreDia' => 'Nombre Dia',
			'idDia' => 'Id Dia',
			'hora' => 'Hora',
			'divisorSemana' => 'Divisor Semana',
			'horaIngreso' => 'Hora Ingreso',
			'horaSalida' => 'Hora Salida',
			'comentarioRutina' => 'Comentario Rutina',
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

		$criteria->compare('idRutina',$this->idRutina);
//		$criteria->compare('mantenimientosRutina.idMantenimientoEmpresa',$idMantenimientoEmpresa);
		$criteria->compare('semana',$this->semana);
		$criteria->compare('nombreDia',$this->nombreDia,true);
		$criteria->compare('idDia',$this->idDia);
		$criteria->compare('hora',$this->hora,true);
		$criteria->compare('divisorSemana',$this->divisorSemana);
		$criteria->compare('horaIngreso',$this->horaIngreso,true);
		$criteria->compare('horaSalida',$this->horaSalida,true);
		$criteria->compare('comentarioRutina',$this->comentarioRutina,true);


                
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function searchEmpresas($idMantenimientoEmpresa)
	{
		$criteria=new CDbCriteria;

		$criteria->compare('idRutina',$this->idRutina);
		$criteria->compare('manteminientosRutina.idMantenimientoEmpresa',$idMantenimientoEmpresa);
		$criteria->compare('semana',$this->semana);
		$criteria->compare('nombreDia',$this->nombreDia,true);
		$criteria->compare('idDia',$this->idDia);
		$criteria->compare('hora',$this->hora,true);
		$criteria->compare('divisorSemana',$this->divisorSemana);
		$criteria->compare('horaIngreso',$this->horaIngreso,true);
		$criteria->compare('horaSalida',$this->horaSalida,true);
		$criteria->compare('comentarioRutina',$this->comentarioRutina,true);


                
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function getSemana()
	{
    	return array('1' => '1ra Semana', '2' => '2da Semana', '3' => '3ra Semana',	'4' => '4ta Semana');
	}

	
	public function getIdDia()
	{
    	return array('1' => 'Lunes', '2' => 'Martes', '3' => 'Miercoles',
    	'4' => 'Jueves', '5' => 'Viernes', '6' => 'Sabado', '7' => 'Domingo');
	}

}

	