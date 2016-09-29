<?php

/**
 * This is the model class for table "facturasOrdenesTrabajo".
 *
 * The followings are the available columns in table 'facturasOrdenesTrabajo':
 * @property integer $idFacturaOrden
 * @property integer $idFacturaSaliente
 * @property integer $idOrdenTrabajo
 * @property string $fecha
 */
class FacturasOrdenesTrabajo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FacturasOrdenesTrabajo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function behaviors()
	{
    	return array(
        	'LoggableBehavior'=>
            	'application.modules.auditTrail.behaviors.LoggableBehavior',
    	);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'facturasOrdenesTrabajo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('idFacturaSaliente, idOrdenTrabajo, fecha', 'required'),
			array('idFacturaSaliente, idOrdenTrabajo', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idFacturaOrden, idFacturaSaliente, idOrdenTrabajo, fecha', 'safe', 'on'=>'search'),
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
			'idFacturaOrden' => 'Id Factura Orden',
			'idFacturaSaliente' => 'Factura',
			'idOrdenTrabajo' => 'Id Orden Trabajo',
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

		$criteria->compare('idFacturaOrden',$this->idFacturaOrden);
		$criteria->compare('idFacturaSaliente',$this->idFacturaSaliente);
		$criteria->compare('t.idOrdenTrabajo',$this->idOrdenTrabajo);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->select = 't.*,ordenesTrabajo.*';
		$criteria->join = "LEFT JOIN facturasSalientes ON t.idFacturaSaliente = facturasSalientes.idFacturaSaliente 
LEFT JOIN ordenesTrabajo_estados ON t.idOrdenTrabajo = ordenesTrabajo_estados.idOrdenTrabajo 
LEFT JOIN ordenesTrabajo ON t.idOrdenTrabajo = ordenesTrabajo.idOrdenTrabajo "
		;

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}