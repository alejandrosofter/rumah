<?php

/**
 * This is the model class for table "reloj_Turnos".
 *
 * The followings are the available columns in table 'reloj_Turnos':
 * @property integer $idTurno
 * @property string $idTipoTurno
 * @property string $ingresoInicio
 * @property string $salidaInicio
 * @property string $ingresoRegreso
 * @property string $salidaRegreso
 * @property string $semana
 * @property string $diaNombre
 * @property string $horas
 * @property string $horas50
 * @property string $horas100
 * @property string $horas50Noct
 * @property string $horas100Noct
 * @property string $idCategoria
 */
class RelojTurnos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RelojTurnos the static model class
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
		return 'reloj_Turnos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idTipoTurno, ingresoInicio, salidaInicio, ingresoRegreso, salidaRegreso, semana, diaNombre, horas, horas50, horas100, horas50Noct, horas100Noct, idCategoria', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idTurno, idTipoTurno, ingresoInicio, salidaInicio, ingresoRegreso, salidaRegreso, semana, diaNombre, horas, horas50, horas100, horas50Noct, horas100Noct, idCategoria', 'safe', 'on'=>'search'),
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
			'idTurno' => 'Turno',
			'idTipoTurno' => 'Tipo Turno',
			'ingresoInicio' => 'Ingreso Inicio',
			'salidaInicio' => 'Salida Inicio',
			'ingresoRegreso' => 'Ingreso Regreso',
			'salidaRegreso' => 'Salida Regreso',
			'semana' => 'Semana',
			'diaNombre' => 'Día',
			'horas' => 'Horas',
			'horas50' => 'Horas 50',
			'horas100' => 'Horas 100',
			'horas50Noct' => 'Horas 50 Noct',
			'horas100Noct' => 'Horas 100 Noct',
			'idCategoria' => 'Categoria',
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

		$criteria->compare('idTurno',$this->idTurno);
		$criteria->compare('idTipoTurno',$this->idTipoTurno,true);
		$criteria->compare('ingresoInicio',$this->ingresoInicio,true);
		$criteria->compare('salidaInicio',$this->salidaInicio,true);
		$criteria->compare('ingresoRegreso',$this->ingresoRegreso,true);
		$criteria->compare('salidaRegreso',$this->salidaRegreso,true);
		$criteria->compare('semana',$this->semana,true);
		$criteria->compare('diaNombre',$this->diaNombre,true);
		$criteria->compare('horas',$this->horas,true);
		$criteria->compare('horas50',$this->horas50,true);
		$criteria->compare('horas100',$this->horas100,true);
		$criteria->compare('horas50Noct',$this->horas50Noct,true);
		$criteria->compare('horas100Noct',$this->horas100Noct,true);
		$criteria->compare('idCategoria',$this->idCategoria,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}