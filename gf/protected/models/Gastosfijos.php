<?php

/**
 * This is the model class for table "gastosfijos".
 *
 * The followings are the available columns in table 'gastosfijos':
 * @property integer $idGastoFijo
 * @property double $importe
 * @property string $detalle
 * @property integer $idProveedor
 * @property integer $periodicidadMeses
 * @property integer $esVariable
 * @property integer $numeroDiaVence
 * @property string $fechaComienzo
 */
class Gastosfijos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Gastosfijos the static model class
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
		return 'gastosfijos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idProveedor, periodicidadMeses, esVariable, numeroDiaVence', 'numerical', 'integerOnly'=>true),
			array('importe', 'numerical'),
			array('detalle, fechaComienzo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idGastoFijo, importe, detalle, idProveedor, periodicidadMeses, esVariable, numeroDiaVence, fechaComienzo', 'safe', 'on'=>'search'),
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
			'idGastoFijo' => 'Id Gasto Fijo',
			'importe' => 'Importe',
			'detalle' => 'Detalle',
			'idProveedor' => 'Id Proveedor',
			'periodicidadMeses' => 'Periodicidad Meses',
			'esVariable' => 'Es Variable',
			'numeroDiaVence' => 'Numero Dia Vence',
			'fechaComienzo' => 'Fecha Comienzo',
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

		$criteria->compare('idGastoFijo',$this->idGastoFijo);
		$criteria->compare('importe',$this->importe);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('idProveedor',$this->idProveedor);
		$criteria->compare('periodicidadMeses',$this->periodicidadMeses);
		$criteria->compare('esVariable',$this->esVariable);
		$criteria->compare('numeroDiaVence',$this->numeroDiaVence);
		$criteria->compare('fechaComienzo',$this->fechaComienzo,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}