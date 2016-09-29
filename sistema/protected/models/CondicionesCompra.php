<?php

/**
 * This is the model class for table "condicionesCompra".
 *
 * The followings are the available columns in table 'condicionesCompra':
 * @property integer $idCondicionCompra
 * @property string $descripcion
 * @property double $generaFacturaCredito
 */
class CondicionesCompra extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CondicionesCompra the static model class
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
		return 'condicionesCompra';
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
			array('descripcion', 'required'),
			array('generaFacturaCredito', 'numerical'),
			array('descripcion', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idCondicionCompra, descripcion, generaFacturaCredito', 'safe', 'on'=>'search'),
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
			'idCondicionCompra' => 'Id Condicion Compra',
			'descripcion' => 'Descripcion',
			'generaFacturaCredito' => 'Genera Factura Credito',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function etiquetas($nom)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$nom=rtrim(ltrim($nom));
		$criteria->compare('descripcion',$nom,true);

		return self::model()->findAll($criteria);
	}
        public function getIdCondicionContado()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('descripcion','Contado',true);
                $res=self::model()->findAll($criteria);
		return count($res)>0?$res[0]['idCondicionCompra']:0;
	}
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idCondicionCompra',$this->idCondicionCompra);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('generaFacturaCredito',$this->generaFacturaCredito);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}