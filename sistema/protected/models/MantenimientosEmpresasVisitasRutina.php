<?php

/**
 * This is the model class for table "mantenimientosEmpresas_visitasRutina".
 *
 * The followings are the available columns in table 'mantenimientosEmpresas_visitasRutina':
 * @property integer $idMantenimientoEmpresaVisitaRutina
 * @property integer $idMantenimientoEmpresa
 * @property integer $semana
 * @property string $nombreDia
 * @property integer $idDia
 * @property string $hora
 * @property integer $divisorSemana
 * @property string $horaIngreso
 * @property string $horaSalida
 * @property string $comentarioVisita
 */
class MantenimientosEmpresasVisitasRutina extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return MantenimientosEmpresasVisitasRutina the static model class
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
		return 'mantenimientosEmpresas_visitasRutina';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idMantenimientoEmpresa, semana, idDia, hora, comentarioVisita', 'required'),
			array('idMantenimientoEmpresa, semana, idDia, divisorSemana', 'numerical', 'integerOnly'=>true),
			array('nombreDia', 'length', 'max'=>50),
			array('comentarioVisita', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idMantenimientoEmpresaVisitaRutina, idMantenimientoEmpresa, semana, nombreDia, idDia, hora, divisorSemana, horaIngreso, horaSalida, comentarioVisita', 'safe', 'on'=>'search'),
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
           'mantenimientosEmpresas'=>array(self::BELONGS_TO,'MantenimientosEmpresas','idMantenimientoEmpresa'),
		   'clientes'=>array(self::HAS_ONE, 'Clientes', 'idClienteEmpresa','through'=>'mantenimientosEmpresas'),
//		   'users'=>array(self::HAS_MANY,'User','user_id','through'=>'roles'),
       );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idMantenimientoEmpresaVisitaRutina' => 'Mantenimiento Empresa Visita Rutina',
			'idMantenimientoEmpresa' => 'Mantenimiento Empresa',
			'semana' => 'Semana',
			'nombreDia' => 'Nombre Dia',
			'idDia' => 'Dia',
			'hora' => 'Hora',
			'divisorSemana' => 'Divisor Semana',
			'horaIngreso' => 'Hora Ingreso',
			'horaSalida' => 'Hora Salida',
			'comentarioVisita' => 'Comentario Visita',
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

		$criteria->compare('idMantenimientoEmpresaVisitaRutina',$this->idMantenimientoEmpresaVisitaRutina);
		$criteria->compare('t.idMantenimientoEmpresa',$this->idMantenimientoEmpresa);
		$criteria->compare('semana',$this->semana);
		$criteria->compare('nombreDia',$this->nombreDia,true);
		$criteria->compare('idDia',$this->idDia);
		$criteria->compare('hora',$this->hora,true);
		$criteria->compare('divisorSemana',$this->divisorSemana);
		$criteria->compare('horaIngreso',$this->horaIngreso,true);
		$criteria->compare('horaSalida',$this->horaSalida,true);
		$criteria->compare('comentarioVisita',$this->comentarioVisita,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function ripearDia($idDia)
	{
		
		$array['1']= 'Lunes';
		$array['2']= 'Martes';
		$array['3']= 'Miercoles';
		$array['4']= 'Jueves';
		$array['5']= 'Viernes';
		$array['6']= 'Sabado';
		$array['7']= 'Domingo';
		return $array[$idDia];
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