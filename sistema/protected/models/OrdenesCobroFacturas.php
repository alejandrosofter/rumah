<?php

/**
 * This is the model class for table "ordenesCobroFacturas".
 *
 * The followings are the available columns in table 'ordenesCobroFacturas':
 * @property integer $idOrdenCobroFacturas
 * @property integer $idOrdenCobro
 * @property integer $idFacturaSaliente
 * @property integer $idFacturaVencimiento
 * @property double $importeCobroFactura
 *
 * The followings are the available model relations:
 * @property FacturasSalientesVencimiento $idFacturaVencimiento0
 * @property OrdenesCobro $idOrdenCobro0
 */
class OrdenesCobroFacturas extends CActiveRecord
{
	public $pagado;
	public $idFacturaSalientesVencimiento;
	public $importe;
	
	public $factura;
	public $vencimiento;
	public $estado;
	/**
	 * Returns the static model of the specified AR class.
	 * @return OrdenesCobroFacturas the static model class
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
		return 'ordenesCobroFacturas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idOrdenCobro, idFacturaSaliente, idFacturaVencimiento', 'numerical', 'integerOnly'=>true),
			array('importeCobroFactura', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idOrdenCobroFacturas, idOrdenCobro, idFacturaSaliente, idFacturaVencimiento, importeCobroFactura', 'safe', 'on'=>'search'),
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
			'idFacturaVencimiento0' => array(self::BELONGS_TO, 'FacturasSalientesVencimiento', 'idFacturaVencimiento'),
			'idOrdenCobro0' => array(self::BELONGS_TO, 'OrdenesCobro', 'idOrdenCobro'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idOrdenCobroFacturas' => 'Id Orden Cobro Facturas',
			'idOrdenCobro' => 'Id Orden Cobro',
			'idFacturaSaliente' => 'Id Factura Saliente',
			'idFacturaVencimiento' => 'Id Factura Vencimiento',
			'importeCobroFactura' => 'Importe Cobro Factura',
		);
	}

	

public  function afterSave()
	{
		parent::afterSave();
		$factVencimiento=FacturasSalientesVencimiento::model()->consultarFacturaUnica($this->idFacturaSaliente);
                if($factVencimiento!=false){
                    $factura=  FacturasSalientes::model()->consultarUnica($this->idFacturaSaliente);
                        $resto=round($factVencimiento['importeFacturaSaliente'],Settings::model()->getValorSistema('DECIMALES_FACTURAS'))-round($factura['pagos'],Settings::model()->getValorSistema('DECIMALES_FACTURAS'));
                        
                        if($resto<=0){
                            FacturasSalientesVencimiento::model()->cambiarEstado($this->idFacturaVencimiento,'CANC');
                            FacturasSalientes::model()->chequearEstado($this->idFacturaSaliente);
                        }
                    
                }else echo 'no se pudo cambiar el estado a la factura '.$this->idFacturaSaliente;
		
      	return parent::afterSave();
	}
	public  function beforeDelete()
	{
		parent::beforeDelete();
		
    	FacturasSalientesVencimiento::model()->cambiarEstado($this->idFacturaVencimiento,'PEND');
		FacturasSalientes::model()->chequearEstado($this->idFacturaSaliente);
		
      	return parent::beforeDelete();
	}
	public function consultarVencimientos($idFactura)
	{
		$criteria=new CDbCriteria;

		$criteria->compare('idFacturaSaliente',$idFactura);

		return self::model()->findAll($criteria);
	}
	public function quitarPagos($idFactura)
	{
		$res=$this->consultarVencimientos($idFactura);
		foreach($res as $item){
			$modItem= self::model()->findByPk($item['idOrdenCobroFacturas']);
			$modItem->delete();
		}
	}




	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{

		
        $criteria=new CDbCriteria;
		$criteria->select = "facturasSalientesVencimiento.estado as estado,
		CONCAT(facturasSalientes.numeroFactura,' (',facturasSalientes.estado,')') as factura, 
		t.*,(facturasSalientesVencimiento.fechaVencimiento) as vencimiento";
		
		$criteria->join = "LEFT JOIN facturasSalientes on facturasSalientes.idFacturaSaliente = t.idFacturaSaliente ".
		"LEFT JOIN facturasSalientesVencimiento on t.idFacturaVencimiento = facturasSalientesVencimiento.idFacturaVencimiento ";
		

		$criteria->compare('idOrdenCobroFacturas',$this->idOrdenCobroFacturas);
		$criteria->compare('idOrdenCobro',$this->idOrdenCobro);
		$criteria->compare('idFacturaSaliente',$this->idFacturaSaliente);
		$criteria->compare('idFacturaVencimiento',$this->idFacturaVencimiento);
		$criteria->compare('importeCobroFactura',$this->importeCobroFactura);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}