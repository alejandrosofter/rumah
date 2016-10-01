<?php

/**
 * This is the model class for table "ordenesPago_vencimientos".
 *
 * The followings are the available columns in table 'ordenesPago_vencimientos':
 * @property integer $idOrdenPagoVencimiento
 * @property integer $idFacturaEntrante
 * @property integer $idFacturaEntranteVencimiento
 * @property double $importe
 */
class OrdenesPagoVencimientos extends CActiveRecord
{
	public $idOrdenPago;
	public $factura;
	public $vencimiento;
	public $estado;
	public $pagado;
	public $nombreFacturaEntrante;
	public $nombreFacturaEntranteVencimiento;
	
//	public $idFacturaSaliente;
//	public $idOrdenCobro;
	/**
	 * Returns the static model of the specified AR class.
	 * @return OrdenesPagoVencimientos the static model class
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
		return 'ordenesPago_vencimientos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idFacturaEntrante, idOrdenPago,idFacturaEntranteVencimiento', 'numerical', 'integerOnly'=>true),
			array('importe', 'numerical'),
			array('idFacturaEntranteVencimiento','required'),
			array('nombreFacturaEntrante,nombreFacturaEntranteVencimiento', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idOrdenPagoVencimiento, idFacturaEntrante, idFacturaEntranteVencimiento, importe', 'safe', 'on'=>'search'),
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
			'idOrdenPagoVencimiento' => 'Id Orden Pago Vencimiento',
			'idFacturaEntrante' => 'Factura',
			'idFacturaEntranteVencimiento' => 'Vencimiento',
			'importe' => 'Importe',
			'estado' => 'Estado Venc.',
		);
	}
	public  function afterSave()
	{
		parent::afterSave();
		
		$factVencimiento=FacturasEntrantesVencimientos::model()->consultarFacturaUnica($this->idFacturaEntranteVencimiento);
		$resto=$factVencimiento['importe']-$factVencimiento['pagado'];
	
    	if($resto > 0)
    		FacturasEntrantesVencimientos::model()->cambiarEstado($this->idFacturaEntranteVencimiento,'PEND');
    		else FacturasEntrantesVencimientos::model()->cambiarEstado($this->idFacturaEntranteVencimiento,'CANC');
		FacturasEntrantes::model()->chequearEstado($this->idFacturaEntrante);
      	return parent::afterSave();
	}
	public  function beforeDelete()
	{
		parent::beforeDelete();
		
    	FacturasEntrantesVencimientos::model()->cambiarEstado($this->idFacturaEntranteVencimiento,'PEND');
		FacturasEntrantes::model()->chequearEstado($this->idFacturaEntrante);
		
      	return parent::beforeDelete();
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

		$criteria->compare('idOrdenPago',$this->idOrdenPago);

		$criteria->select = "facturasEntrantes_vencimientos.estado as estado,CONCAT(facturasEntrantes.numeroFactura,' (',facturasEntrantes.estado,')') as factura, t.*,(facturasEntrantes_vencimientos.fechaVencimiento) as vencimiento
				";
		$criteria->join = "LEFT JOIN facturasEntrantes on facturasEntrantes.idFacturaEntrante = t.idFacturaEntrante ".
		"LEFT JOIN facturasEntrantes_vencimientos on t.idFacturaEntranteVencimiento = facturasEntrantes_vencimientos.idFacturaVencimiento ";
		
		$criteria->group=' t.idOrdenPagoVencimiento ';
		$criteria->order ='t.idOrdenPagoVencimiento desc';

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}