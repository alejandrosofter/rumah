<?php

/**
 * This is the model class for table "conceptos".
 *
 * The followings are the available columns in table 'conceptos':
 * @property integer $idConcepto
 * @property string $nombreConcepto
 * @property integer $idCuentaContable
 * @property string $codigoConcepto
 */
class Conceptos extends CActiveRecord
{
	public $nombreCuenta;
	public $importe;
	public $alicuotaIva;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Conceptos the static model class
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
		return 'conceptos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombreConcepto, idCuentaContable, codigoConcepto', 'required'),
			array('idCuentaContable', 'numerical', 'integerOnly'=>true),
			array('codigoConcepto', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idConcepto, nombreConcepto, idCuentaContable, codigoConcepto', 'safe', 'on'=>'search'),
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
			'idConcepto' => 'Id Concepto',
			'nombreConcepto' => 'Concepto',
			'idCuentaContable' => 'Cuenta Contable',
			'nombreCuenta' => 'Cuenta',
			'codigoConcepto' => 'Codigo Concepto',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	
	public function consultarEtiquetas($nombre)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$this->nombreConcepto=$nombre;
		$this->codigoConcepto=$nombre;
		$criteria->compare('nombreConcepto',$this->nombreConcepto,true,'OR');
		$criteria->compare('codigoConcepto',$this->codigoConcepto,true,'OR');
		$criteria->select="t.*";

		return self::model()->findAll($criteria);
	}
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idConcepto',$this->idConcepto);
		$criteria->compare('nombreConcepto',$this->nombreConcepto,true);
		$criteria->compare('idCuentaContable',$this->idCuentaContable);
		$criteria->compare('codigoConcepto',$this->codigoConcepto,true);
		$criteria->join="INNER JOIN cuentas on cuentas.idCuenta = t.idCuentaContable";
		$criteria->select="t.*,cuentas.nombre as nombreCuenta";

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}