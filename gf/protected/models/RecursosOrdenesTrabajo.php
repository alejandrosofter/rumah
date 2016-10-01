<?php

/**
 * This is the model class for table "recursos_ordenesTrabajo".
 *
 * The followings are the available columns in table 'recursos_ordenesTrabajo':
 * @property integer $idOrdenTrabajoRecurso
 * @property integer $idTipoRecurso
 * @property string $nombre
 * @property string $descripcion
 */
class RecursosOrdenesTrabajo extends CActiveRecord
{
    public $tipoRecurso;
	/**
	 * Returns the static model of the specified AR class.
	 * @return RecursosOrdenesTrabajo the static model class
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
		return 'recursos_ordenesTrabajo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idTipoRecurso', 'numerical', 'integerOnly'=>true),
			array('nombre, descripcion', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idOrdenTrabajoRecurso, idTipoRecurso, nombre, descripcion', 'safe', 'on'=>'search'),
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
			'idOrdenTrabajoRecurso' => 'Id Orden Trabajo Recurso',
			'idTipoRecurso' => 'Tipo Recurso',
			'nombre' => 'Nombre',
			'descripcion' => 'Descripcion',
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

		$criteria->compare('idOrdenTrabajoRecurso',$this->idOrdenTrabajoRecurso);
		$criteria->compare('idTipoRecurso',$this->idTipoRecurso);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);
                $criteria->join="LEFT JOIN  recursos_tiporecursos_ordenestrabajo on  recursos_tiporecursos_ordenestrabajo.idOrdenTrabajoTipoRecurso = t.idTipoRecurso";
                $criteria->select="t.*, recursos_tiporecursos_ordenestrabajo.nombreTipoRecurso as tipoRecurso";

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}