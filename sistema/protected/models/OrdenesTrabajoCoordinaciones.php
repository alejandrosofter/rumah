<?php

/**
 * This is the model class for table "ordenesTrabajo_coordinaciones".
 *
 * The followings are the available columns in table 'ordenesTrabajo_coordinaciones':
 * @property integer $idOrdenesCoordinaciones
 * @property integer $idOrdenes
 * @property integer $idEvento
 * @property integer $idCalendario
 * @property string $comentario
 */
class OrdenesTrabajoCoordinaciones extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return OrdenesTrabajoCoordinaciones the static model class
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
		return 'ordenesTrabajo_coordinaciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
//			array('idOrdenes, idEvento, idCalendario, comentario', 'required'),
			array('idOrdenes, idEvento, idCalendario', 'numerical', 'integerOnly'=>true),
			array('comentario', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idOrdenesCoordinaciones, idOrdenes, idEvento, idCalendario, comentario', 'safe', 'on'=>'search'),
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
			'idOrdenesCoordinaciones' => 'Id Ordenes Coordinaciones',
			'idOrdenes' => 'Id Ordenes',
			'idEvento' => 'Id Evento',
			'idCalendario' => 'Id Calendario',
			'comentario' => 'Comentario',
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

		$criteria->compare('idOrdenesCoordinaciones',$this->idOrdenesCoordinaciones);
		$criteria->compare('idOrdenes',$this->idOrdenes);
		$criteria->compare('idEvento',$this->idEvento);
		$criteria->compare('idCalendario',$this->idCalendario);
		$criteria->compare('comentario',$this->comentario,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}