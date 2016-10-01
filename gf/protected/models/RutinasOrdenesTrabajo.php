<?php

/**
 * This is the model class for table "rutinas_ordenesTrabajo".
 *
 * The followings are the available columns in table 'rutinas_ordenesTrabajo':
 * @property integer $idOrdenTrabajoRutina
 * @property string $nombreRutina
 * @property integer $esFacturable
 * @property integer $esContratada
 * @property double $duracionDias
 * @property string $prioridad
 * @property string $descripcionCliente
 * @property string $descripcionEncargado
 */
class RutinasOrdenesTrabajo extends CActiveRecord
{
    public $esPredeterminada;
    public $idStock;
	/**
	 * Returns the static model of the specified AR class.
	 * @return RutinasOrdenesTrabajo the static model class
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
		return 'rutinas_ordenesTrabajo';
	}
        public function getPredeterminada()
        {
            $criteria=new CDbCriteria;

		$criteria->compare('esPredeterminada',1);
		$res=RutinasOrdenesTrabajo::model()->findAll($criteria);
                if(count($res)==0) return false;
                return $res[0];
        }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('esFacturable,idStock,esPredeterminada, esContratada', 'numerical', 'integerOnly'=>true),
			array('duracionDias', 'numerical'),
			array('nombreRutina, prioridad, descripcionCliente, descripcionEncargado', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idOrdenTrabajoRutina, nombreRutina, esFacturable, esContratada, duracionDias, prioridad, descripcionCliente, descripcionEncargado', 'safe', 'on'=>'search'),
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
			'idOrdenTrabajoRutina' => 'Id Orden Trabajo Rutina',
			'nombreRutina' => 'Nombre Rutina',
			'esFacturable' => 'Es Facturable',
			'esContratada' => 'Es Contratada',
			'duracionDias' => 'Duracion Dias',
			'prioridad' => 'Prioridad',
                    'idStock' => 'Producto/Servicio Asociado',
			'descripcionCliente' => 'Descripcion Cliente',
			'descripcionEncargado' => 'Descripcion Encargado',
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

		$criteria->compare('idOrdenTrabajoRutina',$this->idOrdenTrabajoRutina);
		$criteria->compare('nombreRutina',$this->nombreRutina,true);
		$criteria->compare('esFacturable',$this->esFacturable);
		$criteria->compare('esContratada',$this->esContratada);
		$criteria->compare('duracionDias',$this->duracionDias);
		$criteria->compare('prioridad',$this->prioridad,true);
		$criteria->compare('descripcionCliente',$this->descripcionCliente,true);
		$criteria->compare('descripcionEncargado',$this->descripcionEncargado,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}