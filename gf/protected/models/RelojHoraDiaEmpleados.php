<?php

/**
 * This is the model class for table "reloj_horaDiaEmpleados".
 *
 * The followings are the available columns in table 'reloj_horaDiaEmpleados':
 * @property integer $idHoraDiaEmpleado
 * @property string $idEmpleado
 * @property string $fechaDia
 * @property string $estadoFecha
 * @property string $comentario
 * @property string $entradaUno
 * @property string $salidaUno
 * @property string $entradaDos
 * @property string $salidaDos
 * @property string $entradaTres
 * @property string $salidaTres
 * @property string $modificacion
 */
class RelojHoraDiaEmpleados extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RelojHoraDiaEmpleados the static model class
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
		return 'reloj_horaDiaEmpleados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idEmpleado, estadoFecha, comentario, entradaUno, salidaUno, entradaDos, salidaDos, entradaTres, salidaTres, modificacion', 'length', 'max'=>255),
			array('fechaDia', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idHoraDiaEmpleado, idEmpleado, fechaDia, estadoFecha, comentario, entradaUno, salidaUno, entradaDos, salidaDos, entradaTres, salidaTres, modificacion', 'safe', 'on'=>'search'),
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
			'idHoraDiaEmpleado' => 'Hora Dia Empleado',
			'idEmpleado' => 'Empleado',
			'fechaDia' => 'Fecha Dia',
			'estadoFecha' => 'Estado Fecha',
			'comentario' => 'Comentario',
			'entradaUno' => 'Entrada Uno',
			'salidaUno' => 'Salida Uno',
			'entradaDos' => 'Entrada Dos',
			'salidaDos' => 'Salida Dos',
			'entradaTres' => 'Entrada Tres',
			'salidaTres' => 'Salida Tres',
			'modificacion' => 'Modificacion',
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

		$criteria->compare('idHoraDiaEmpleado',$this->idHoraDiaEmpleado);
		$criteria->compare('idEmpleado',$this->idEmpleado,true);
		$criteria->compare('fechaDia',$this->fechaDia,true);
		$criteria->compare('estadoFecha',$this->estadoFecha,true);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->compare('entradaUno',$this->entradaUno,true);
		$criteria->compare('salidaUno',$this->salidaUno,true);
		$criteria->compare('entradaDos',$this->entradaDos,true);
		$criteria->compare('salidaDos',$this->salidaDos,true);
		$criteria->compare('entradaTres',$this->entradaTres,true);
		$criteria->compare('salidaTres',$this->salidaTres,true);
		$criteria->compare('modificacion',$this->modificacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}