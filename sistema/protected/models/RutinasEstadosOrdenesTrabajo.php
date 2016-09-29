<?php

/**
 * This is the model class for table "rutinas_estados_ordenesTrabajo".
 *
 * The followings are the available columns in table 'rutinas_estados_ordenesTrabajo':
 * @property integer $idOrdenTrabajoRutinaEstado
 * @property integer $idRutina
 * @property double $dias
 * @property string $estado
 * @property string $detalle
 * @property integer $nroEstado
 * @property double $costoTiempo
 */
class RutinasEstadosOrdenesTrabajo extends CActiveRecord
{
    public $rutina;
    public $enviaMail;
	/**
	 * Returns the static model of the specified AR class.
	 * @return RutinasEstadosOrdenesTrabajo the static model class
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
		return 'rutinas_estados_ordenesTrabajo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idRutina, nroEstado,enviaMail', 'numerical', 'integerOnly'=>true),
			array('dias, costoTiempo', 'numerical'),
			array('estado, detalle', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idOrdenTrabajoRutinaEstado, idRutina, dias, estado, detalle, nroEstado, costoTiempo', 'safe', 'on'=>'search'),
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
			'idOrdenTrabajoRutinaEstado' => 'Id Orden Trabajo Rutina Estado',
			'idRutina' => 'Id Rutina',
			'dias' => 'Dias',
			'estado' => 'Estado',
			'detalle' => 'Detalle',
			'nroEstado' => 'Nro Estado',
			'costoTiempo' => 'Costo Tiempo',
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

		$criteria->compare('idOrdenTrabajoRutinaEstado',$this->idOrdenTrabajoRutinaEstado);
		$criteria->compare('idRutina',$this->idRutina);
		$criteria->compare('dias',$this->dias);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('nroEstado',$this->nroEstado);
		$criteria->compare('costoTiempo',$this->costoTiempo);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
        public function consultarRutina($id)
	{
		$criteria=new CDbCriteria;

		$criteria->compare('idRutina',$id);
		$criteria->order="t.nroEstado desc";
		return self::model()->findAll($criteria);
	}
}