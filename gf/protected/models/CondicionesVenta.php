<?php

/**
 * This is the model class for table "condicionesVenta".
 *
 * The followings are the available columns in table 'condicionesVenta':
 * @property integer $idCondicionVenta
 * @property string $descripcionVenta
 * @property string $generaFacturaCredito
 *
 * The followings are the available model relations:
 * @property CondicionesVentaItems[] $condicionesVentaItems
 */
class CondicionesVenta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CondicionesVenta the static model class
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
		return 'condicionesVenta';
	}
	public function behaviors()
	{
    	return array(
        	'LoggableBehavior'=>
            	'application.modules.auditTrail.behaviors.LoggableBehavior',
    	);
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                    array('descripcionVenta','required'),
			array('descripcionVenta, generaFacturaCredito', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idCondicionVenta, descripcionVenta, generaFacturaCredito', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function etiquetas($nom)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$nom=rtrim(ltrim($nom));
		$criteria->compare('descripcionVenta',$nom,true);

		return self::model()->findAll($criteria);
	}
	
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
//			'condicionesVentaItems' => array(self::HAS_MANY, 'CondicionesVentaItems', 'idCondicionVenta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCondicionVenta' => 'Id Condicion Venta',
			'descripcionVenta' => 'Descripcion Venta',
			'generaFacturaCredito' => 'Genera Factura Credito',
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

		$criteria->compare('idCondicionVenta',$this->idCondicionVenta);
		$criteria->compare('descripcionVenta',$this->descripcionVenta,true);
		$criteria->compare('generaFacturaCredito',$this->generaFacturaCredito,true);
		$criteria->select="t.* ";
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}