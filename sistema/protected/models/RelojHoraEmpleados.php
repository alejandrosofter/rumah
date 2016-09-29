<?php

/**
 * This is the model class for table "reloj_horaEmpleados".
 *
 * The followings are the available columns in table 'reloj_horaEmpleados':
 * @property integer $idHora
 * @property string $idEmpleado
 * @property string $justificado
 * @property string $estadoHora
 * @property string $fechaHoraTrabajo
 * @property string $entradaSalida
 * @property string $comentarioHora
 */
class RelojHoraEmpleados extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RelojHoraEmpleados the static model class
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
		return 'reloj_horaEmpleados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idEmpleado, justificado, estadoHora, entradaSalida, comentarioHora', 'length', 'max'=>255),
			array('fechaHoraTrabajo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idHora, idEmpleado, justificado, estadoHora, fechaHoraTrabajo, entradaSalida, comentarioHora', 'safe', 'on'=>'search'),
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
			'idHora' => 'Hora',
			'idEmpleado' => 'Empleado',
			'justificado' => 'Justificado',
			'estadoHora' => 'Estado Hora',
			'fechaHoraTrabajo' => 'Fecha Hora Trabajo',
			'entradaSalida' => 'Entrada Salida',
			'comentarioHora' => 'Comentario Hora',
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

		$criteria->compare('idHora',$this->idHora);
		$criteria->compare('idEmpleado',$this->idEmpleado,true);
		$criteria->compare('justificado',$this->justificado,true);
		$criteria->compare('estadoHora',$this->estadoHora,true);
		$criteria->compare('fechaHoraTrabajo',$this->fechaHoraTrabajo,true);
		$criteria->compare('entradaSalida',$this->entradaSalida,true);
		$criteria->compare('comentarioHora',$this->comentarioHora,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function consultarHoras($fi,$ff,$idEmpleado)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('fechaHoraTrabajo','>='.$fi,false);
                $criteria->compare('fechaHoraTrabajo','<='.$ff,false);
                $criteria->compare('idEmpleado',$idEmpleado,false);
		return self::model()->findAll($criteria);
	}
}