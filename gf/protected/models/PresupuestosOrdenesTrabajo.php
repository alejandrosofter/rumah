<?php

/**
 * This is the model class for table "presupuestos_ordenesTrabajo".
 *
 * The followings are the available columns in table 'presupuestos_ordenesTrabajo':
 * @property integer $idPresupuestoOrden
 * @property integer $idPresupuesto
 * @property integer $idOrdenTrabajo
 * @property string $fecha
 */
class PresupuestosOrdenesTrabajo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return PresupuestosOrdenesTrabajo the static model class
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
		return 'presupuestos_ordenesTrabajo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
			array('idPresupuesto, idOrdenTrabajo', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPresupuestoOrden, idPresupuesto, idOrdenTrabajo, fecha', 'safe', 'on'=>'search'),
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
			'idPresupuestoOrden' => 'Id Presupuesto Orden',
			'idPresupuesto' => 'Id Presupuesto',
			'idOrdenTrabajo' => 'Orden de Trabajo',
			'fecha' => 'Fecha',
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

		$criteria->compare('idPresupuestoOrden',$this->idPresupuestoOrden);
		$criteria->compare('t.idPresupuesto',$this->idPresupuesto);
		$criteria->compare('idOrdenTrabajo',$this->idOrdenTrabajo);
		$criteria->compare('fecha',$this->fecha,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}