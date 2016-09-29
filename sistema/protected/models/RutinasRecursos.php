<?php

/**
 * This is the model class for table "rutinas_recursos".
 *
 * The followings are the available columns in table 'rutinas_recursos':
 * @property integer $idRutinaIdRecurso
 * @property integer $idRutina
 * @property integer $idRecurso
 */
class RutinasRecursos extends CActiveRecord
{
    public $rutina;
    public $recurso;
	/**
	 * Returns the static model of the specified AR class.
	 * @return RutinasRecursos the static model class
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
		return 'rutinas_recursos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idRutina, idRecurso', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idRutinaIdRecurso, idRutina, idRecurso', 'safe', 'on'=>'search'),
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
			'idRutinaIdRecurso' => 'Id Rutina Id Recurso',
			'idRutina' => 'Id Rutina',
			'idRecurso' => 'Id Recurso',
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

		$criteria->compare('idRutinaIdRecurso',$this->idRutinaIdRecurso);
		$criteria->compare('idRutina',$this->idRutina);
		$criteria->compare('idRecurso',$this->idRecurso);
                 $criteria->join="LEFT JOIN  recursos_ordenesTrabajo on  recursos_ordenesTrabajo.idOrdenTrabajoRecurso = t.idRecurso";
                $criteria->select="t.*, recursos_ordenesTrabajo.nombre as recurso";

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}