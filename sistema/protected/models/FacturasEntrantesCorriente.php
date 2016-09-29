<?php

/**
 * This is the model class for table "facturasEntrantesCorriente".
 *
 * The followings are the available columns in table 'facturasEntrantesCorriente':
 * @property integer $idFacturaEntranteCorriente
 * @property integer $idFacturaEntrante
 * @property string $fechaDesde
 * @property string $fechaHasta
 * @property string $estadoFactura
 * @property string $comentario
 *
 * The followings are the available model relations:
 * @property FacturasEntrantes $idFacturaEntrante0
 */
class FacturasEntrantesCorriente extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FacturasEntrantesCorriente the static model class
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
		return 'facturasEntrantesCorriente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idFacturaEntrante, fechaDesde, fechaHasta, estadoFactura, comentario', 'required'),
			array('idFacturaEntrante', 'numerical', 'integerOnly'=>true),
			array('estadoFactura', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idFacturaEntranteCorriente, idFacturaEntrante, fechaDesde, fechaHasta, estadoFactura, comentario', 'safe', 'on'=>'search'),
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
			'idFacturaEntrante0' => array(self::BELONGS_TO, 'FacturasEntrantes', 'idFacturaEntrante'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idFacturaEntranteCorriente' => 'Id Factura Entrante Corriente',
			'idFacturaEntrante' => 'Id Factura Entrante',
			'fechaDesde' => 'Fecha Desde',
			'fechaHasta' => 'Fecha Hasta',
			'estadoFactura' => 'Estado Factura',
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

		$criteria->compare('idFacturaEntranteCorriente',$this->idFacturaEntranteCorriente);
		$criteria->compare('idFacturaEntrante',$this->idFacturaEntrante);
		$criteria->compare('fechaDesde',$this->fechaDesde,true);
		$criteria->compare('fechaHasta',$this->fechaHasta,true);
		$criteria->compare('estadoFactura',$this->estadoFactura,true);
		$criteria->compare('comentario',$this->comentario,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}