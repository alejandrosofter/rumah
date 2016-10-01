<?php

/**
 * This is the model class for table "ordenesCobro".
 *
 * The followings are the available columns in table 'ordenesCobro':
 * @property integer $idOrdenCobro
 * @property string $fechaOrdenCobro
 * @property integer $idCliente
 * @property double $importeAcuenta
 *
 * The followings are the available model relations:
 * @property OrdenesCobroFactuas[] $ordenesCobroFactuases
 */
class OrdenesCobro extends CActiveRecord
{
	public $idCliente;
	public $pagado;
	public $apellido;
	public $razonSocial;
	public $cliente;
	public $parcial;
	public $estado;
	public $factura;
	public $idFacturaSaliente;
	public $selecciones;
        public $idFormaPago;
        public $formaPago;
        public $estadoOrden;
        public $paraCargar;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return OrdenesCobro the static model class
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
		return 'ordenesCobro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('idCliente', 'fechaOrdenCobro', 'required'),
			array('fechaOrdenCobro,idFormaPago, idCliente', 'required'),
			array('idCliente', 'numerical', 'integerOnly'=>true),
			array('importeAcuenta', 'numerical'),
			array('fechaOrdenCobro,estadoOrden', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idOrdenCobro, fechaOrdenCobro, idCliente, importeAcuenta', 'safe', 'on'=>'search'),
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
			'ordenesCobroFactuases' => array(self::HAS_MANY, 'OrdenesCobroFactuas', 'idOrdenCobro'),
			'clientes' => array(self::HAS_MANY, 'Clientes', 'idCliente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idOrdenCobro' => 'Id Orden Cobro',
			'fechaOrdenCobro' => 'Fecha Orden Cobro',
			'idCliente' => 'Cliente',
			'importeAcuenta' => 'Importe a cuenta',
		'parcial' => '$ Imputado',
                    'idFormaPago' => 'Forma de Pago',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public  function beforeDelete()
	{
		parent::beforeDelete();
			
		OrdenesCobro::model()->getIpFacturasSalientes($this->idOrdenCobro);
    	
		
      	return parent::beforeDelete();
      	
	}
        public function consultarImporteCuenta($idCliente)
        {
            $sql="SELECT COALESCE(sum(t.importeAcuenta),0) as importe FROM ordenesCobro t WHERE idCliente='$idCliente'";
            $connection=Yii::app()->getDb();
            $command=$connection->createCommand($sql);
            
            $res= $command->queryAll();
            if(count($res)==0) return 0;
            return $res[0]['importe'];
         }
        public function consultarPagosCuenta($idCliente)
        {
                $criteria=new CDbCriteria;
            
		$criteria->compare('t.idCliente',$idCliente,false);
                $criteria->compare('t.importeAcuenta','>0',true);
                
		$criteria->order='t.idOrdenCobro desc';
		
		return self::model()->findAll($criteria);
        }
	public function getIpFacturasSalientes($idOrdenCobro)
	{
		$connection=Yii::app()->getDb();
		        $command=$connection->createCommand("
SELECT facturasSalientes.idFacturaSaliente as idFacturaSaliente,  ordenesCobroFacturas.idFacturaVencimiento as idFacturaVencimiento
from ordenesCobro t LEFT JOIN clientes on clientes.idCliente = t.idCliente 
LEFT JOIN ordenesCobroFacturas on ordenesCobroFacturas.idOrdenCobro = t.idOrdenCobro 
LEFT JOIN facturasSalientes on facturasSalientes.idFacturaSaliente = ordenesCobroFacturas.idFacturaSaliente 
LEFT JOIN facturasSalientesVencimiento on ordenesCobroFacturas.idFacturaVencimiento = facturasSalientesVencimiento.idFacturaVencimiento  
WHERE t.idOrdenCobro = $idOrdenCobro
		       ");
            $res=$command->queryAll();
        for($i=0;count($res)>$i;$i++)
        {
        	  FacturasSalientesVencimiento::model()->cambiarEstado($res[$i]['idFacturaVencimiento'] ,'PEND');
			  FacturasSalientes::model()->chequearEstado($res[$i]['idFacturaSaliente']);
        }
          
           
            
            
           
	}
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
	$criteria->select= "t.*,CONCAT(clientes.apellido,' ',clientes.razonSocial) as cliente,formasDePago.nombreForma as formaPago,
						facturasSalientesVencimiento.estado as estado,
						CONCAT(facturasSalientes.numeroFactura,' (',facturasSalientes.estado,')') as factura,
						SUM(ordenesCobroFacturas.importeCobroFactura) as parcial,
						facturasSalientes.idFacturaSaliente as idFacturaSaliente
						";
	if(isset($_GET['cliente'])){
            $criteria->compare('clientes.apellido',$_GET['cliente'],true,"OR");
            $criteria->compare('clientes.nombre',$_GET['cliente'],true,"OR");
            $criteria->compare('clientes.razonSocial',$_GET['cliente'],true,"OR");
            $criteria->compare('clientes.idCliente',$_GET['cliente'],true,"OR");
        }
		

		$criteria->join = " LEFT JOIN clientes on clientes.idCliente = t.idCliente ".
		" LEFT JOIN ordenesCobroFacturas on ordenesCobroFacturas.idOrdenCobro = t.idOrdenCobro ".
		"LEFT JOIN facturasSalientes on facturasSalientes.idFacturaSaliente = ordenesCobroFacturas.idFacturaSaliente ".
                "LEFT JOIN formasDePago on formasDePago.idFormaPago = t.idFormaPago ".
		"LEFT JOIN facturasSalientesVencimiento on ordenesCobroFacturas.idFacturaVencimiento = facturasSalientesVencimiento.idFacturaVencimiento ";

		$criteria->group=' t.idOrdenCobro ';
		$criteria->order='t.idOrdenCobro desc';
		
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}