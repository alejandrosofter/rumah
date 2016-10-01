<?php

/**
 * This is the model class for table "facturasSalientesVencimiento".
 *
 * The followings are the available columns in table 'facturasSalientesVencimiento':
 * @property integer $idFacturaVencimiento
 * @property integer $idFacturaSaliente
 * @property string $fechaVencimiento
 * @property string $estado
 * @property double $importeFacturaSaliente
 *
 * The followings are the available model relations:
 * @property FacturasSalientes $idFacturaSaliente0
 * @property OrdenesCobroFactuas[] $ordenesCobroFactuases
 */
class FacturasSalientesVencimiento extends CActiveRecord
{
	public $diasVencidos;
	public $cliente;
	public $factura;
	public $importe;
	public $importeF;
	public $idFacturaSaliente;
        public $procesar;
        public $pagado;
	/**
	 * Returns the static model of the specified AR class.
	 * @return FacturasSalientesVencimiento the static model class
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
		return 'facturasSalientesVencimiento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idFacturaSaliente', 'numerical', 'integerOnly'=>true),
			array('importeFacturaSaliente,pagado,idFacturaVencimiento', 'numerical'),
			array('estado', 'length', 'max'=>255),
			array('fechaVencimiento,importeF,factura,procesar', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idFacturaVencimiento, idFacturaSaliente, fechaVencimiento, estado, importeFacturaSaliente', 'safe', 'on'=>'search'),
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
			'ordenesCobroFactuases' => array(self::HAS_MANY, 'OrdenesCobroFactuas', 'idFacturaVencimiento'),
		);
	}
	
	public function consultarFacturaUnica($idFacturaSaliente)
	{
		$connection=Yii::app()->getDb();
                $sql="SELECT t . * ,ROUND( (
t.importeFacturaSaliente
),2) AS importe,ROUND( SUM( `ordenesCobroFacturas`.`importeCobroFactura` ),2) AS pagado
FROM facturasSalientesVencimiento t
LEFT JOIN ordenesCobroFacturas ON ordenesCobroFacturas.idFacturaVencimiento = t.idFacturaVencimiento
WHERE t.idFacturaSaliente = '$idFacturaSaliente'
AND t.estado LIKE 'PEND'
GROUP BY t.idFacturaVencimiento";
        $command=$connection->createCommand($sql);
     
		$fact=$command->queryAll();
                if(count($fact)==0) return false;
		return $fact[0];

	}
	public function cambiarEstado($idFacturaVencimiento,$estado)
	{
		$fact = self::model()->findByPk($idFacturaVencimiento);
		
//		trigger_error($idFacturaVencimiento);
//		$fact=self::model()->findByPk($idFacturaVencimiento);
		if($fact!=null){
			$fact->estado=$estado;
			$fact->save(); 	
		}else echo 'no encuentra el vencimiento '.$idFacturaVencimiento;
		
	}

	public function consultarPendientes($idCliente,$arr=false,$conImporteFaltante=true)
	{
		$criteria=new CDbCriteria;
		$criteria->compare('t.estado','PEND');
		$criteria->compare('facturasSalientes.idCliente',$idCliente);
		if($conImporteFaltante)$cad="(t.importeFacturaSaliente - COALESCE(SUM(ordenesCobroFacturas.importeCobroFactura),0))";else $cad="0";
		$criteria->select = "t.*, ROUND($cad,2) as importeF, 
		ROUND(SUM(ordenesCobroFacturas.importeCobroFactura),2) as pagado,
				facturasSalientes.numeroFactura as factura";
		$criteria->join = "left join ordenesCobroFacturas on 
		ordenesCobroFacturas.idFacturaVencimiento = t.idFacturaVencimiento ".
		"LEFT JOIN facturasSalientes on facturasSalientes.idFacturaSaliente = t.idFacturaSaliente";
		
		$criteria->group=' t.idFacturaVencimiento ';
		$criteria->order='t.idFacturaVencimiento desc';
		
                   
               if($arr) return self::model ()->findAll($criteria);
		
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));

	}
	
	public function consultarVencimientos($idFactura)
	{
		$criteria=new CDbCriteria;

		$criteria->compare('idFacturaSaliente',$idFactura);

		return self::model()->findAll($criteria);
	}
	public function quitarVencimientos($idFactura)
	{
		$criteria=new CDbCriteria;

		$criteria->compare('idFacturaSaliente',$idFactura);

		$res= self::model()->findAll($criteria);
		foreach($res as $item){
			$modItem= self::model()->findByPk($item['idFacturaVencimiento']);
			$modItem->delete();
		}
	}
	
public function ingresarVencimientos($idFacturaSaliente)
	{
		$factura=FacturasSalientes::model()->findByPk($idFacturaSaliente);
		$condicion=CondicionesVenta::model()->findByPk($factura->idCondicionVenta);
		$model=new CondicionesVentaItems;
		$model->idCondicionVenta=$factura->idCondicionVenta;
		$condiciones=$model->consultarCondiciones();
		
		//si cuota == 0 pago efectivo contado no ingreso la coutavencimientotooooo!!
		foreach($condiciones as $cond)
		{

				$this->ingresarCuotas($cond['cantidadCuotas'],$factura,$cond,$idFacturaSaliente,$cond['CantidadDiasMesesCuotas'],$cond['aVencerEnDias']);
			
			
		}
		
			
			
		
	}
	
public function consultarEtiquetasPendientesVencimiento($nombre,$idFactura)
	{
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand(
"SELECT t . * , t.idFacturaVencimiento as idFacturaVencimiento, ROUND((
t.importeFacturaSaliente
),2) AS importe, ROUND(SUM( ordenesCobroFacturas.importeCobroFactura ),2) AS pagado
FROM facturasSalientesVencimiento t
LEFT JOIN ordenesCobroFacturas ON ordenesCobroFacturas.idFacturaVencimiento = t.idFacturaVencimiento
WHERE t.idFacturaSaliente = '$idFactura'
AND t.estado LIKE 'PEND'
GROUP BY t.idFacturaVencimiento ");
		return $command->queryAll();

	}
	public function consultarEtiquetasPendientes($nombre,$idCliente)
	{
				$connection=Yii::app()->getDb();
        $command=$connection->createCommand(
"SELECT t.* from facturasSalientes_view t WHERE t.idCliente='$idCliente' AND t.estado like 'PEND'");
		return $command->queryAll();
		
		

	}
	public function consultarPendientesPago($nombre,$idFactura)
	{
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand(
"SELECT t.* from facturasSalientesVencimiento t 

 WHERE t.idFacturaSaliente='$idFactura' AND t.estado like 'PEND' GROUP BY t.idFacturaVencimiento");
		return $command->queryAll();

	}
	
	private function ingresarCuotas($cantidadCuotas,$factura,$cond,$idFacturaSaliente,$diasVencimiento,$avencer)
	{
		$date = new DateTime; //hoy
		$dia=isset($diasVencimiento)?$diasVencimiento:'0';
		
		$avencer=isset($avencer)?$avencer:'0';
		$estado='PEND';
		if ($cantidadCuotas==0) {
			$estado='CANC';
		}
		$cantidadCuotas=($cantidadCuotas==0)?1:$cantidadCuotas;
		
//		if($cond['porcentajeInteres']==0)
//		{
//			$interes=0;
//		}
//		else 
//		{
//			$interes = (($factura['importe']*($cond['porcentajeTotalFacturado']/100))/$cantidadCuotas) / $cond['porcentajeInteres'];
//		}
		$date->modify( $avencer.' day' );
		$importe=((FacturasSalientes::model()->getImporteFactura($factura->idFacturaSaliente)*($cond['porcentajeTotalFacturado']/100))/$cantidadCuotas) ;
//		echo 'importe: '. $factura['importeFactura'];
//		echo 'porcentajeTotalFacturado: '. $cond['porcentajeTotalFacturado'];
//		echo '$cantidadCuotas: '. $cantidadCuotas;
//		echo '$interes: '.$interes;
		for($i=0;$cantidadCuotas>$i;$i++){
				
				$date->modify( $dia.' day' );
				
				$fecha=$date->format('Y-m-d');
				$mod=new FacturasSalientesVencimiento;
				$mod->idFacturaSaliente=$idFacturaSaliente;
				$mod->fechaVencimiento=$fecha;
				$mod->estado=$estado;
				$mod->importeFacturaSaliente=number_format ($importe, Settings::model()->getValorSistema('DECIMALES_FACTURAS'), ".", "");
				$mod->save();
		}
		
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idFacturaVencimiento' => 'Id Factura Vencimiento',
			'idFacturaSaliente' => 'Id Factura Saliente',
			'fechaVencimiento' => 'Fecha Vencimiento',
			'estado' => 'Estado',
			'importeFacturaSaliente' => 'Importe Factura Saliente',
		);
	}
	public function buscarVencidas()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('t.fechaVencimiento',$this->fechaVencimiento,true);
		$criteria->compare('t.estado',$this->estado,true);
$criteria->select = "t.*,concat(clientes.razonSocial,clientes.apellido,' ',clientes.nombre) as cliente,datediff(NOW(),t.fechaVencimiento) as diasVencidos";
		$criteria->join = "LEFT JOIN facturasSalientes on facturasSalientes.idFacturaSaliente = t.idFacturaSaliente ".
		'LEFT JOIN clientes on clientes.idCliente = facturasSalientes.idCliente ' ;
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
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
		

//		$criteria->compare('idFacturaVencimiento',$this->idFacturaVencimiento);
		$criteria->compare('idFacturaSaliente',$_GET['idFacturaSaliente']);
//		$criteria->compare('fechaVencimiento',$this->fechaVencimiento,true);
//		$criteria->compare('estado',$this->estado,true);
//		$criteria->compare('importeFacturaSaliente',$this->importeFacturaSaliente);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}