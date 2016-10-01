<?php

/**
 * This is the model class for table "facturasSalientesCorriente".
 *
 * The followings are the available columns in table 'facturasSalientesCorriente':
 * @property integer $idFacturaSalienteCorriente
 * @property integer $idFacturaSaliente
 * @property string $fechaDesde
 * @property string $fechaHasta
 * @property string $estadoFactura
 * @property string $comentario
 *
 * The followings are the available model relations:
 * @property FacturasSalientes $idFacturaSaliente0
 */
class FacturasSalientesCorriente extends CActiveRecord
{
	public $periodicidad;
	public $importe;
	public $cantidadItems;
	public $tipoFactura;
	public $cliente;
	public $idCliente;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return FacturasSalientesCorriente the static model class
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
		return 'facturasSalientesCorriente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fechaDesde, fechaHasta, estadoFactura, periodicidad', 'required'),
			array('idFacturaSaliente,periodicidad', 'numerical', 'integerOnly'=>true),
			array('estadoFactura', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idFacturaSalienteCorriente, idFacturaSaliente, fechaDesde, fechaHasta, estadoFactura, comentario', 'safe', 'on'=>'search'),
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
			'idFacturaSaliente0' => array(self::BELONGS_TO, 'FacturasSalientes', 'idFacturaSaliente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idFacturaSalienteCorriente' => 'Id Factura Saliente Corriente',
			'idFacturaSaliente' => 'Id Factura Saliente',
			'fechaDesde' => 'Fecha Desde',
			'fechaHasta' => 'Fecha Hasta',
			'estadoFactura' => 'Estado Factura',
			'comentario' => 'Comentario',
			'periodicidad' => 'Periodicidad DIAS',
			
		);
	}
	
	public function getEstados()
	{
    	return array('Alta' => 'Alta', 'Baja' => 'Baja');
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

		$criteria->compare('idFacturaSalienteCorriente',$this->idFacturaSalienteCorriente);
		$criteria->compare('idFacturaSaliente',$this->idFacturaSaliente);
		$criteria->compare('fechaDesde',$this->fechaDesde,true);
		$criteria->compare('fechaHasta',$this->fechaHasta,true);
		$criteria->compare('estadoFactura',$this->estadoFactura,true);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->select = "t.*, facturasSalientes_view.*";
		$criteria->join = "LEFT JOIN facturasSalientes_view on facturasSalientes_view.idFacturaSaliente = t.idFacturaSaliente "
		
		;

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}