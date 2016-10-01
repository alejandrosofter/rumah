<?php

/**
 * This is the model class for table "facturasEntrantes".
 *
 * The followings are the available columns in table 'facturasEntrantes':
 * @property integer $idFacturaEntrante
 * @property integer $idProveedor
 * @property string $fecha
 * @property string $fechaVencimiento
 * @property string $numeroFactura
 * @property double $precio
 * @property string $descripcion
 * @property string $estado
 * @property string $tipoFactura
 * @property integer $idCentroCosto
 * @property double $iva21
 * @property double $iva105
 */
class FacturasEntrantes extends CActiveRecord
{
    public $iva;
	public $nombreProveedor;
	public $importePagos;
	public $cantidadPagos;
	public $nombreFactura;
	public $cuitProveedor;
	public $neto21;
	public $neto105;
	public $esCorriente;
	public $condicion;
	public $condicionIva;
	public $importe;
	public $importe105;
	public $importe21;
	public $idCondicionCompra;
	public $importeImpuestos;
	public $importeDescuentos;
	public $importeRecargos;
	public $importeFlete;
	public $preciosCargados;
	public $fechaCargaPrecios;
        public $importeDescuento105;
        public $idConcepto;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return FacturasEntrantes the static model class
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
		return 'facturasEntrantes';
	}
        public function resetItemsFactura($idFactura)
        {
            $items=ComprasItems::model()->consultarProductos($idFactura, true);
            foreach ($items as $value) 
                Stock::model()->decrementarStock($value['idStock'],$value['cantidad']); 
            
        }
        private function getTipoDoc($tipoFactura,$idProveedor)
        {
            $consFinal=$this->esConsumidorFinal($idProveedor);
            if($consFinal){
                switch ($tipoFactura) {
                    case 'A': return 80;
                    break;
                    case 'B': return 99;
                    break;
                    default: return 99;
                        break;
                }
            }else{
                switch ($tipoFactura) {
                    case 'A': return 80;
                    break;
                    case 'B': return 80;
                    break;
                    default: return 99;
                    
                        break;
                }
            }
            
        }
        public function getTextoAlicuotaCompras($fechaInicio,$fechaFin)
		{
			
			$sql="SELECT t.*,proveedores.*,
				if(t.condicion='Stock',
SUM(compras_items.importeCompra*compras_items.cantidad*(IF( t.tipoFactura='A',((compras_items.alicuotaIva/100)+1),1))), 
	SUM(facturasEntrantes_concepto.importe * (IF( t.tipoFactura='A',((facturasEntrantes_concepto.alicuotaIva/100)+1),1)) ))+(t.importeFlete*1.21)+t.importeRecargos+t.importeImpuestos-t.importeDescuentos-(t.importeDescuentos*0.21) as importe,
if(t.condicion='Stock',
SUM(IF(compras_items.alicuotaIva='10.5',compras_items.importeCompra*compras_items.cantidad,0)),
	SUM(IF(facturasEntrantes_concepto.alicuotaIva='10.5',facturasEntrantes_concepto.importe,0))) as importe105,
if(t.condicion='Stock',
SUM(IF(compras_items.alicuotaIva='21',compras_items.importeCompra*compras_items.cantidad,0))-(t.importeDescuentos*0.21),
	SUM(IF(facturasEntrantes_concepto.alicuotaIva='21',facturasEntrantes_concepto.importe,0))-(t.importeDescuentos*0.21)) as importe21 FROM facturasEntrantes t LEFT JOIN proveedores on proveedores.idProveedor = t.idProveedor LEFT JOIN compras_items on t.idFacturaEntrante = compras_items.idFacturaEntrante LEFT JOIN facturasEntrantes_concepto on t.idFacturaEntrante = facturasEntrantes_concepto.idFacturaEntrante  
	 WHERE t.tipoFactura<>'X' AND t.fecha BETWEEN '$fechaInicio 00:00:00' AND '$fechaFin 00:00:00' AND t.estado<>'ANULADA' group by t.idFacturaEntrante";
	                $connection=Yii::app()->getDb();
	                $command=$connection->createCommand($sql);

	                $texto="";
	                $res= $command->queryAll();
	                $i=0;
	                foreach ($res as $value){
	                    $i++;
	                    $texto.=$this->getLineaAlicuotaCitiCompras($value,($i==count($res)));
	                    
	                }
	                    
	                return $texto;

		}
        public function getTextoCitiCompras($fechaInicio,$fechaFin)
		{
			
			$sql="SELECT t.*,proveedores.*,
				if(t.condicion='Stock',
SUM(compras_items.importeCompra*compras_items.cantidad*(IF( t.tipoFactura='A',((compras_items.alicuotaIva/100)+1),1))), 
	SUM(facturasEntrantes_concepto.importe * (IF( t.tipoFactura='A',((facturasEntrantes_concepto.alicuotaIva/100)+1),1)) ))+(t.importeFlete*1.21)+t.importeRecargos+t.importeImpuestos-t.importeDescuentos-(t.importeDescuentos*0.21) as importe,
if(t.condicion='Stock',
SUM(IF(compras_items.alicuotaIva='10.5',compras_items.importeCompra*compras_items.cantidad,0)),
	SUM(IF(facturasEntrantes_concepto.alicuotaIva='10.5',facturasEntrantes_concepto.importe,0))) as importe105,
if(t.condicion='Stock',
SUM(IF(compras_items.alicuotaIva='21',compras_items.importeCompra*compras_items.cantidad,0))-(t.importeDescuentos*0.21),
	SUM(IF(facturasEntrantes_concepto.alicuotaIva='21',facturasEntrantes_concepto.importe,0))-(t.importeDescuentos*0.21)) as importe21 FROM facturasEntrantes t LEFT JOIN proveedores on proveedores.idProveedor = t.idProveedor LEFT JOIN compras_items on t.idFacturaEntrante = compras_items.idFacturaEntrante LEFT JOIN facturasEntrantes_concepto on t.idFacturaEntrante = facturasEntrantes_concepto.idFacturaEntrante  
	 WHERE t.tipoFactura<>'X' AND t.fecha BETWEEN '$fechaInicio 00:00:00' AND '$fechaFin 00:00:00' AND t.estado<>'ANULADA' group by t.idFacturaEntrante";
	                $connection=Yii::app()->getDb();
	                $command=$connection->createCommand($sql);

	                $texto="";
	                $res= $command->queryAll();
	                $i=0;
	                foreach ($res as $value){
	                    $i++;
	                    $texto.=$this->getLineaCitiCompras($value,($i==count($res)));
	                    
	                }
	                    
	                return $texto;

		}
		public function getTipoComprobante($letraTalonario)
        {
            $sal='011'; //TICKET COMUN
            if($letraTalonario=='A')$sal= '001';
            if($letraTalonario=='B')$sal= '006';
            if($letraTalonario=='C')$sal= '011';
            return $sal;
        }
        private function getLineaAlicuotaCitiCompras($datos,$ultimo)
        {
            $proveedor=Proveedores::model()->findByPk($datos['idProveedor']);
            $alicuotas=$this->getAlicuotas($datos['idFacturaEntrante']);
            //$model=FacturasEntrantes::model()->findByPk($datos['idFacturaEntrante']);

            $fecha=explode(' ', $datos['fecha']);
            $fact=explode('-', $datos['numeroFactura']);
            $nroComprobante=str_pad(str_replace(' ','',str_replace('-','',$fact[1])),20,'0', STR_PAD_LEFT);
            $ptoVenta=str_pad(str_replace(' ','',$fact[0]),5,'0', STR_PAD_LEFT);
            $cuit=str_replace(' ','',str_replace('-', '', $proveedor->cuit));
            
           $linea='';
            
            foreach($alicuotas as $key=>$valor){
            	$co=explode('_',$key); //EN key viene el formato alicuota_21 o alicuota_27 etx
            	$coef=($co[1]/100)+1;
            	$importeNeto=number_format($datos['importe']/$coef,2,'','');
	            $importeTotal=number_format($datos['importe'],2,'','');
	            $importeLiquidado=number_format(($datos['importe']-($datos['importe']/$coef)),2,'','');

	            $linea=$this->getTipoComprobante($datos['tipoFactura']); // tipo de comprobante 3
	            $linea.=$ptoVenta; // talonario 5
	            $linea.=$nroComprobante; // nro Factura 20
	            $linea.='80'; // cod documento 2
	            $linea.=str_pad($cuit,20,'0', STR_PAD_LEFT).''; //cuit emisor 20
	            $linea.=str_pad($importeNeto,15,'0', STR_PAD_LEFT).''; // importe de la factura NETO 15

	            $arrAlic=explode('_',$key);

	            $codAlicuota='0004'; // AL 10.5 %
	            if($arrAlic[1]==27)$codAlicuota='0006'; // AL 27 %
	            if($arrAlic[1]==21)$codAlicuota='0005';// AL 21 %
	            $linea.=$codAlicuota;
	            $linea.=str_pad($importeLiquidado,15,'0', STR_PAD_LEFT).''; // importe de la factura NETO 15
	            $linea.=CHR(10);
            }
           
            
            //if(!$ultimo) $linea.=CHR(10); // salto de pagina
            return $linea;
            
        }
        public function getAlicuotas($idFactura)
        {
        	$fact=FacturasEntrantes::model()->findByPk($idFactura);
        	$data=array();
        	$items=$fact->condicion=='Stock'?$fact->itemsStock:$fact->itemsConcepto;
        	
        	foreach($items as $item){
        		$importe=isset($item->importe)?$item->importe:$item->importeCompra;
        		//if($fact->condicion=='Stock')$importe=$importe*($item->alicuotaIva/100+1);
        		$cantidad=isset($item->cantidad)?$item->cantidad:1;
        		$total=$importe*$cantidad;
        		$index='alicuota_'.$item->alicuotaIva;
        		$data[$index]=(isset($data[$index])?$data[$index]:0)+$total;
        		if($fact->condicion=='Stock'){
        		//echo 'item:'.$importe.'<br>';
        	}
        	}
        	
        	
        	return $data;
        }
		private function getLineaCitiCompras($datos,$ultimo)
        {
            $proveedor=Proveedores::model()->findByPk($datos['idProveedor']);
            $fecha=explode(' ', $datos['fecha']);
            $fact=explode('-', $datos['numeroFactura']);
            $nroComprobante=str_pad(str_replace(' ','',str_replace('-','',$fact[1])),20,'0', STR_PAD_LEFT);
            $ptoVenta=str_pad(str_replace(' ','',$fact[0]),5,'0', STR_PAD_LEFT);
            $cuit=str_replace(' ','',str_replace('-', '', $proveedor->cuit));
           $importeNeto=number_format($datos['importe']/1.21,2,'','');
           $importeTotal=number_format($datos['importe'],2,'','');
           $importeLiquidado=number_format(($datos['importe']/1.21)*0.21,2,'','');
          	$nroDespacho=str_pad('',16,'0', STR_PAD_LEFT);
            
            $linea=str_replace('-', '', $fecha[0]); // fecha 8
            $linea.=$this->getTipoComprobante($datos['tipoFactura']); // tipo de comprobante 3
            $linea.=$ptoVenta; // talonario 5
            $linea.=$nroComprobante; // nro Factura 20
            $linea.=str_pad(' ',16,' ', STR_PAD_LEFT).''; // NRO despacho 16
            $linea.='80'; // cod documento 2
            $linea.=str_pad($cuit,20,'0', STR_PAD_LEFT).''; //cuit emisor 20
            $linea.=''.str_pad(FacturasSalientes::quitarCaracteresEspeciales($datos['nombre']),30,' ', STR_PAD_RIGHT).''; // NOMBRE VENDEDOR 30
            $linea.=str_pad($importeTotal,15,'0', STR_PAD_LEFT).''; // importe de la factura NETO 15
            $linea.=str_pad(0,15,'0', STR_PAD_LEFT).''; // importe no grabado
            $linea.=str_pad(0,15,'0', STR_PAD_LEFT).''; // importe no grabado
            $linea.=str_pad(0,15,'0', STR_PAD_LEFT).''; // importe exento
            $linea.=str_pad(0,15,'0', STR_PAD_LEFT).''; // importe valor agregado
            $linea.=str_pad(0,15,'0', STR_PAD_LEFT).''; // importe impuestos nacionales
            $linea.=str_pad(0,15,'0', STR_PAD_LEFT).''; // importe ingresos brutos
            $linea.=str_pad(0,15,'0', STR_PAD_LEFT).''; // importe ingresos municipales
            $linea.='PES';
            $linea.=str_pad('0001000000',10,'0', STR_PAD_LEFT).''; // tipo de cambio
            $alicuotas=$this->getAlicuotas($datos['idFacturaEntrante']);
            $linea.=$datos['tipoFactura']=="C"?'0':count($alicuotas);//cantidad de alicuotas
            $linea.='0';// codigo de operacion
            $linea.=str_pad(0,15,'0', STR_PAD_LEFT).''; //credito fiscal computable
            $linea.=str_pad(0,15,'0', STR_PAD_LEFT).''; //otros tributos
            $linea.=str_pad('0',11,'0', STR_PAD_LEFT).''; //cuit emisor
            $linea.=str_pad('',30,' ', STR_PAD_LEFT).''; //nombre emisor
            $linea.=str_pad(0,15,'0', STR_PAD_LEFT).''; //iva comision
            if(!$ultimo) $linea.=CHR(10); // salto de pagina
         
            return $linea;
            
        }
	public function consultarComprasMes($tipo)
	{
		$fechaInicio=Date('Y-m-01');
		$fechaFin=Date('Y-m-31');
		
		switch($tipo){
			case 'stock':{
				$sql='SELECT t.*,GROUP_CONCAT(stock.nombre) as detalle from facturasEntrantes_view t ' .
						'LEFT JOIN compras_items on compras_items.idFacturaEntrante = t.idFacturaEntrante ' .
						'LEFT JOIN stock on stock.idStock = compras_items.idStock'.
						' WHERE condicion="Stock" AND fecha>"'.$fechaInicio.'" AND fecha<"'.$fechaFin.'" GROUP BY t.idFacturaEntrante';
				break;
			}
			case 'conceptos':{
				$sql='SELECT t.*,GROUP_CONCAT(conceptos.nombreConcepto) as detalle from facturasEntrantes_view t ' .
						'LEFT JOIN facturasEntrantes_concepto on facturasEntrantes_concepto.idFacturaEntrante = t.idFacturaEntrante ' .
						'LEFT JOIN conceptos on conceptos.idConcepto = facturasEntrantes_concepto.idConcepto'.
						' WHERE condicion<>"Stock" AND fecha>"'.$fechaInicio.'" AND fecha<"'.$fechaFin.'" GROUP BY t.idFacturaEntrante';
				break;
			}
		}
		
		$connection=Yii::app()->getDb();
		$command=$connection->createCommand($sql);
		$tot= $command->queryAll();
		return $tot;
	}
	public function consultarImporteCompras($tipo)
	{
		$fechaInicio=Date('Y-m-01');
		$fechaFin=Date('Y-m-31');
		
		switch($tipo){
			case 'stock':{
				$sql='SELECT sum(importe)as total from facturasEntrantes_view t WHERE condicion="Stock" AND fecha>"'.$fechaInicio.'" AND fecha<"'.$fechaFin.'"';
				break;
			}
			case 'conceptos':{
				$sql='SELECT sum(importe)as total from facturasEntrantes_view t WHERE condicion<>"Stock" AND fecha>"'.$fechaInicio.'" AND fecha<"'.$fechaFin.'"';
				break;
			}
		}
		
		$connection=Yii::app()->getDb();
		$command=$connection->createCommand($sql);
		$tot= $command->queryAll();
		return $tot[0];
	}
	public function consultarEtiquetasPendientes($nombre,$idProveedor)
	{
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand(
"SELECT t.* from facturasEntrantes_view t WHERE idProveedor=$idProveedor AND estado like 'PEND'");
		return $command->queryAll();

	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idProveedor, idCondicionCompra, fecha,   numeroFactura,  tipoFactura  ', 'required'),
			array('idProveedor, idCentroCosto', 'numerical', 'integerOnly'=>true),
			//array('', 'string'),
			array('precio, importeFlete,importeImpuestos,importeRecargos,importeDescuento105,importeDescuentos,iva21, iva105', 'numerical'),
			array('fechaVencimiento,numeroFactura', 'length', 'max'=>40),
			array('estado', 'length', 'max'=>29),
			array('tipoFactura', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idFacturaEntrante,  fechaVencimiento, numeroFactura, precio,  estado, tipoFactura, idCentroCosto, iva21, iva105, proveedores.nombre', 'safe', 'on'=>'search'),
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
                        'proveedores' => array(self::BELONGS_TO, 'Proveedores', 'idProveedor'),
                        'itemsConcepto' => array(self::HAS_MANY, 'FacturasEntrantesConcepto', 'idFacturaEntrante'),
                        'itemsStock' => array(self::HAS_MANY, 'ComprasItems', 'idFacturaEntrante'),
                );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idFacturaEntrante' => 'Id Factura',
			'idProveedor' => 'Proveedor',
			'fecha' => 'Fecha Emisión',
			'fechaVencimiento' => 'Fecha Contable',
			'numeroFactura' => 'Nro Factura',
			'precio' => '$ Importe ',
			'descripcion' => 'Descripción',
			'estado' => 'Estado',
			'tipoFactura' => 'Tipo Factura',
			'idCondicionCompra' => 'Condicion de Compra',
			'idCentroCosto' => 'Centro de Costo',
			'iva21' => '$ Iva 21%',
			'iva105' => '$ Iva 10.5%',
			'cantidadPagos' => '$ Pagado',
			'condicionIva' => 'Cond.Iva',
			'importeImpuestos' => '$ Impuestos',
			'importeFlete' => '$ Flete',
			'importeDescuentos' => '$ Descuentos',
			'importeRecargos' => '$ Recargos',
			
		);
	}
	protected function afterDelete()
	{
		parent::beforeDelete();
		if($this->condicion=='Stock'){
			$productos=ComprasItems::model()->consultarProductos($this->idFacturaEntrante);
			foreach($productos->data as $item)
				Stock::model()->decrementarStock($item->idStock,$item->cantidad);
			
		}
		parent::beforeDelete();
		
	}
	public function afterSave()
	{
		parent::afterSave();
		
      	
      		
      	
            return parent::afterSave();
	}
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function getTipoImpresiones()
        {
            return array('Preguntar' => 'Preguntar','Ticket' => 'Ticket','TicketF' => 'Ticket FISCAL', 'Principal' => 'Principal', 'Secundaria' => 'Secundaria', 'Etiqueteadora' => 'Etiqueteadora');
        }
        public function getTipoHojas()
        {
            return array('210x297' => 'A4 (210 x 297 mm)','216x356' => 'LEGAL (216 x 356 mm)', '76x297' => 'Ticket (76 x 297 mm)', '?1x?1' => 'Personalizado 1', '?2x?2' => 'Personalizado 2');
        }
        public static function getTipoFacturas()
	{
    	return array('A' => 'A', 'B' => 'B', 'C' => 'C', 'X' => 'X');
	}
	public static function getCondicion()
	{
    	return array('Stock' => 'Stock', 'Servicios/Insumos' => 'Servicios/Insumos');
	}
	public static function getEstados()
	{
    	return array('PEND' => 'PEND', 'CANC' => 'CANC');
	}
	public function getCondicionIva()
	{
    	return array('Resp.Inscripto' => 'Resp.Inscripto', 'Cons.Final' => 'Cons.Final', 'Monot.' => 'Monot.', 'Exento' => 'Exento');
	}
	public function getEstadosAlertas()
	{
    	return array('1' => 'Activa', '0' => 'Desactiva');
	}
	public function consultarFacturasProveedor($idProveedor)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idProveedor',$idProveedor);
		//$criteria->compare('estado','<>Pagada',true);
		$criteria->select = "t.*, CONCAT('$ ',t.precio,' - ',t.estado) as nombreFactura";
		$criteria->order = "t.estado desc";
		
		return self::model()->findAll($criteria);
	}
	public function consultarFacturas()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		//$criteria->compare('estado','<>Pagada',true);
		$criteria->select = "t.*, CONCAT('$ ',t.precio,' - ',t.estado) as nombreFactura";
		$criteria->order = "t.estado desc";
		$res= new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		return $res->getData();
	}
	private function convertirFecha($fecha)
	{
		$fech = explode('-',$fecha);
		$fecha = $fech[2].'-'.$fech[1].'-'.$fech[0];
		return $fecha;
	}
	public function consultarLibro($tipoLibro,$fechaInicio,$fechaFin)
	{
            $sql="SELECT t.*, proveedores.nombre as nombreProveedor,proveedores.cuit as cuitProveedor from facturasEntrantes_view t LEFT JOIN proveedores on proveedores.idProveedor = t.idProveedor WHERE t.fechaVencimiento BETWEEN '$fechaInicio' AND '$fechaFin' AND tipoFactura='$tipoLibro'";
            $connection=Yii::app()->getDb();
            $command=$connection->createCommand($sql);
            
            return $command->queryAll();
	}
	public function consultarResumen()
	{
		$fechaHoy=Date('Y-m-d');
		$criteria=new CDbCriteria;

		$criteria->select = "t.*,
				if(t.condicion='Stock',
SUM(compras_items.importeCompra*compras_items.cantidad),
	SUM(facturasEntrantes_concepto.importe))+(t.importeFlete*1.21)+t.importeRecargos+t.importeImpuestos-t.importeDescuentos as importe,
if(t.condicion='Stock',
SUM(IF(compras_items.alicuotaIva='10.5',compras_items.importeCompra*compras_items.cantidad,0)),
	SUM(IF(facturasEntrantes_concepto.alicuotaIva='10.5',facturasEntrantes_concepto.importe,0))) as importe105,
if(t.condicion='Stock',
SUM(IF(compras_items.alicuotaIva='21',compras_items.importeCompra*compras_items.cantidad,0)),
	SUM(IF(facturasEntrantes_concepto.alicuotaIva='21',facturasEntrantes_concepto.importe,0))) as importe21";
		$criteria->join = "LEFT JOIN proveedores on proveedores.idProveedor = t.idProveedor ".
		$criteria->join = "LEFT JOIN compras_items on t.idFacturaEntrante = compras_items.idFacturaEntrante ".
		$criteria->join = "LEFT JOIN facturasEntrantes_concepto on t.idFacturaEntrante = facturasEntrantes_concepto.idFacturaEntrante ";
		$criteria->group=' t.idFacturaEntrante ';
		$criteria->order='t.idFacturaEntrante desc';
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function buscarCompraStock()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$sort = new CSort;
        $sort->defaultOrder = 'idFacturaEntrante desc';

		$criteria->compare('idFacturaEntrante',$this->idFacturaEntrante);
		$criteria->compare('idProveedor',$this->idProveedor);
		
		$fechas=explode(' ',$this->fecha);
		$tipo=strtolower($fechas[0]);
		//Para las fechas se separa con ;
		
		switch ($tipo){
			case 'rango':{
				$dosFechas=explode('y',$fechas[0]);
				$criteria->compare('fecha','<'.$dosFechas[0],true);
				$criteria->compare('fecha','>'.$dosFechas[1],true);
				
			}break;
			case 'mes':{
				$mesAno=explode('-',$fechas[1]);
				
				$ano=$mesAno[1];
				$fechaInicio=$ano.'-'.$mesAno[0].'-01';
				$fechaFin=$ano.'-'.($mesAno[0]+1).'-01';
				echo 'fecha Inicio: '.$fechaInicio;
				echo '  Fecha Fin: '.$fechaFin;
				$criteria->compare('fecha','>'.$fechaInicio,true);
				$criteria->compare('fecha','<'.$fechaFin,true);
				
				//$criteria->compare('fecha','< '.$fechaFin,true);
			}break;
			case 'dia':{
				$criteria->compare('fecha',$fechas[1],true);
			}break;
			
		} 

		$criteria->compare('fechaVencimiento',$this->fechaVencimiento,true);
		$criteria->compare('numeroFactura',$this->numeroFactura,true);
		$criteria->compare('importe',$this->importe,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('t.estado',$this->estado,true);
		$criteria->compare('t.condicion',$this->condicion,true);
		$criteria->compare('tipoFactura',$this->tipoFactura,true);
		$criteria->compare('idCentroCosto',$this->idCentroCosto);
		$criteria->compare('iva21',$this->iva21);
		$criteria->compare('iva105',$this->iva105);
		
		if(isset($_GET['nombre']) && trim($_GET['nombre'])!="")
		$criteria->compare('proveedores.nombre',$_GET['nombre'],true); // That didn't work
		
		if(isset($_GET['estado']) && trim($_GET['estado'])!="")
		$criteria->compare('t.estado',$_GET['estado'],true); // That didn't work
		
		if(isset($_GET['tipoFactura']) && trim($_GET['tipoFactura'])!="")
		$criteria->compare('t.tipoFactura',$_GET['tipoFactura'],true); // That didn't work		
		
		
		$criteria->select = "t.*,5 as importe,
if(t.condicion='Stock',
SUM(IF(compras_items.alicuotaIva='10.5',compras_items.importeCompra*compras_items.cantidad,0)),
	SUM(IF(facturasEntrantes_concepto.alicuotaIva='10.5',facturasEntrantes_concepto.importe,0))) as importe105,
if(t.condicion='Stock',
SUM(IF(compras_items.alicuotaIva='21',compras_items.importeCompra*compras_items.cantidad,0))-(t.importeDescuentos*0.21),
	SUM(IF(facturasEntrantes_concepto.alicuotaIva='21',facturasEntrantes_concepto.importe,0))-(t.importeDescuentos*0.21)) as importe21";
		$criteria->join = "LEFT JOIN proveedores on proveedores.idProveedor = t.idProveedor ".
		$criteria->join = "LEFT JOIN stock_precios on stock_precios.idElemento = t.idFacturaEntrante AND stock_precios.tipo = 'compra' ".
		$criteria->join = "LEFT JOIN compras_items on t.idFacturaEntrante = compras_items.idFacturaEntrante ".
		$criteria->join = "LEFT JOIN facturasEntrantes_concepto on t.idFacturaEntrante = facturasEntrantes_concepto.idFacturaEntrante ";
		$criteria->group=' t.idFacturaEntrante ';
		$criteria->order='t.idFacturaEntrante desc';
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort
		));
	}
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$sort = new CSort;
        $sort->defaultOrder = 'idFacturaEntrante desc';

		$criteria->compare('idFacturaEntrante',$this->idFacturaEntrante);
		$criteria->compare('idProveedor',$this->idProveedor);
		
		$fechas=explode(' ',$this->fecha);
		$tipo=strtolower($fechas[0]);
		//Para las fechas se separa con ;
		
		switch ($tipo){
			case 'rango':{
				$dosFechas=explode('y',$fechas[0]);
				$criteria->compare('fecha','<'.$dosFechas[0],true);
				$criteria->compare('fecha','>'.$dosFechas[1],true);
				
			}break;
			case 'mes':{
				$mesAno=explode('-',$fechas[1]);
				
				$ano=$mesAno[1];
				$fechaInicio=$ano.'-'.$mesAno[0].'-01';
				$fechaFin=$ano.'-'.($mesAno[0]+1).'-01';
				echo 'fecha Inicio: '.$fechaInicio;
				echo '  Fecha Fin: '.$fechaFin;
				$criteria->compare('fecha','>'.$fechaInicio,true);
				$criteria->compare('fecha','<'.$fechaFin,true);
				
				//$criteria->compare('fecha','< '.$fechaFin,true);
			}break;
			case 'dia':{
				$criteria->compare('fecha',$fechas[1],true);
			}break;
			
		} 

		$criteria->compare('fechaVencimiento',$this->fechaVencimiento,true);
		$criteria->compare('numeroFactura',$this->numeroFactura,true);
		$criteria->compare('importe',$this->importe,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('t.estado',$this->estado,true);
		$criteria->compare('t.condicion',$this->condicion,true);
		$criteria->compare('tipoFactura',$this->tipoFactura,true);
		$criteria->compare('idCentroCosto',$this->idCentroCosto);
		$criteria->compare('iva21',$this->iva21);
		$criteria->compare('iva105',$this->iva105);
		
		if(isset($_GET['nombre']) && trim($_GET['nombre'])!="")
		$criteria->compare('proveedores.nombre',$_GET['nombre'],true); // That didn't work
		
		if(isset($_GET['estado']) && trim($_GET['estado'])!="")
		$criteria->compare('t.estado',$_GET['estado'],true); // That didn't work
		
		if(isset($_GET['tipoFactura']) && trim($_GET['tipoFactura'])!="")
		$criteria->compare('t.tipoFactura',$_GET['tipoFactura'],true); // That didn't work		
		
		
		$criteria->select = "t.*,
				if(t.condicion='Stock',
SUM(compras_items.importeCompra*compras_items.cantidad*(IF( t.tipoFactura='A',((compras_items.alicuotaIva/100)+1),1))), 
	SUM(facturasEntrantes_concepto.importe * (IF( t.tipoFactura='A',((facturasEntrantes_concepto.alicuotaIva/100)+1),1)) ))+(t.importeFlete*1.21)+t.importeRecargos+t.importeImpuestos-t.importeDescuentos-(IF(t.tipoFactura<>'X',t.importeDescuentos*0.21,0)) as importe,
if(t.condicion='Stock',
SUM(IF(compras_items.alicuotaIva='10.5',compras_items.importeCompra*compras_items.cantidad,0)),
	SUM(IF(facturasEntrantes_concepto.alicuotaIva='10.5',facturasEntrantes_concepto.importe,0))) as importe105,
if(t.condicion='Stock',
SUM(IF(compras_items.alicuotaIva='21',compras_items.importeCompra*compras_items.cantidad,0))-(t.importeDescuentos),
	SUM(IF(facturasEntrantes_concepto.alicuotaIva='21',facturasEntrantes_concepto.importe,0))-(t.importeDescuentos)) as importe21";
		$criteria->join = "LEFT JOIN proveedores on proveedores.idProveedor = t.idProveedor ".
		$criteria->join = "LEFT JOIN compras_items on t.idFacturaEntrante = compras_items.idFacturaEntrante ".
		$criteria->join = "LEFT JOIN facturasEntrantes_concepto on t.idFacturaEntrante = facturasEntrantes_concepto.idFacturaEntrante ";
		$criteria->group=' t.idFacturaEntrante ';
		$criteria->order='t.idFacturaEntrante desc';
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort
		));
	}
	public function consultarSaldoProveedores($fechaInicio,$fechaFin)
	{
		$auxIni = explode("-",$fechaInicio);
		$auxFin = explode("-",$fechaFin);
		
		$auxIni = $auxIni[2].'-'.$auxIni[1].'-'.$auxIni[0];
		$auxFin = $auxFin[2].'-'.$auxFin[1].'-'.$auxFin[0];
		
		$connection=Yii::app()->getDb();
            $command=$connection->createCommand("SELECT ".
		"'debe' as tipo,t.fecha,descripcion as nombreFactura,proveedores.nombre as nombreProveedor, " .
		"ROUND(precio,2) as importeFactura" .
		" FROM facturasEntrantes t INNER JOIN proveedores ON proveedores.idProveedor = t.idProveedor WHERE t.fecha BETWEEN '$auxIni' AND '$auxFin' " .
		"  UNION (SELECT 'haber' as tipo, gastos.fecha, detalle as nombreFactura,proveedores.nombre as nombreProveedor, ROUND(gastos.importe,2) as importeFactura FROM gastos INNER JOIN proveedores ON proveedores.idProveedor = gastos.idProveedor where fecha BETWEEN '$auxIni' AND '$auxFin') ORDER BY fecha");
        
        return $command->queryAll();

	}
	public function consultarSaldo($idProveedor)
	{
		$connection=Yii::app()->getDb();
		$sql="SELECT  sum(t.importe) as importeFacturado,sum((select sum(pagoAcuenta) from ordenesPago where idProveedor='16' )) as importeAcuenta ,sum((select sum(u.importe) from ordenesPago_vencimientos u where u.idFacturaEntrante=t.idFacturaEntrante)) as pagado FROM `facturasEntrantes_view` t

WHERE t.estado='PEND' AND t.idProveedor='$idProveedor' ";
$command=$connection->createCommand($sql);
            $res= $command->queryAll();
            
            $sql="select sum(pagoAcuenta) as importe from ordenesPago where idProveedor='$idProveedor'";
            $command=$connection->createCommand($sql);
            $res2= $command->queryAll();
            return array($res[0],$res2[0]);
	}
	public function consultarSaldoProveedor($fechaInicio,$fechaFin,$idProveedor)
	{
		$auxIni = explode("-",$fechaInicio);
		$auxFin = explode("-",$fechaFin);
		
		$auxIni = $auxIni[2].'-'.$auxIni[1].'-'.$auxIni[0];
		$auxFin = $auxFin[2].'-'.$auxFin[1].'-'.$auxFin[0];
		
		$connection=Yii::app()->getDb();
            $command=$connection->createCommand("SELECT ".
		"'debe' as tipo,t.fecha,descripcion as nombreFactura, " .
		"ROUND(precio,2) as importeFactura" .
		" FROM facturasEntrantes t WHERE t.fecha BETWEEN '$auxIni' AND '$auxFin' AND t.idProveedor = $idProveedor" .
		"  UNION (SELECT 'haber' as tipo, fecha, detalle as nombreFactura, ROUND(importe,2) as importeFactura FROM gastos where fecha BETWEEN '$auxIni' AND '$auxFin' AND idProveedor = $idProveedor) ORDER BY fecha");
            
            return $command->queryAll();

	}
	public function chequearEstado($idFactura)
	{
		$vencimientos=FacturasEntrantesVencimientos::model()->consultarVencimientos($idFactura);
		$factura=self::model()->findByPk($idFactura);
		$cont=0;
		foreach($vencimientos as $item)
			if($item['estado']=='PEND')
				$cont++;
		if($cont>0)
		{
			$factura->estado='PEND';
			$factura->save();
		}else{
			$factura->estado='CANC';
			$factura->save();
		}
		
	}
	public function consultarParaPagar()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$sort = new CSort;
        $sort->defaultOrder = 'idFacturaEntrante desc';
        
        $criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('fechaVencimiento',$this->fechaVencimiento,true);
		$criteria->compare('numeroFactura',$this->numeroFactura,true);
		$criteria->compare('precio',$this->precio,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('tipoFactura',$this->tipoFactura,true);

		$criteria->compare('t.estado','<>Pagada',true);
		
		if(isset($_GET['nombre']) && trim($_GET['nombre'])!="")
		$criteria->compare('proveedores.nombre',$_GET['nombre'],true); // That didn't work
		
		$criteria->select = "t.*,count(gastos.idGasto) as cantidadPagos,ROUND(SUM(gastos.importe),2) as importePagos";
		$criteria->join = "LEFT JOIN proveedores on proveedores.idProveedor = t.idProveedor ".
		$criteria->join = "LEFT JOIN gastos_factura on gastos_factura.idFacturaSaliente = t.idFacturaEntrante ".
		$criteria->join = "LEFT JOIN gastos on gastos.idGasto = gastos_factura.idGasto ";
		$criteria->group='t.idFacturaEntrante';
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort
		));
	}
	public function consultarUnica($idFactura)
	{
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand("
SELECT * from facturasEntrantes_view WHERE idFacturaEntrante = $idFactura");
            $res=$command->queryAll();
        
            return isset($res[0])?$res[0]:null;
	}
	public function consultarCompras($tipo,$dias=0)
	{
		$connection=Yii::app()->getDb();
		switch ($tipo){
			case 'hoy':{
				 $command=$connection->createCommand("
SELECT COUNT(t.idFacturaEntrante) as cantidad, SUM(t.importe) as importe FROM facturasEntrantes_view t WHERE t.fecha = CURDATE()");
            $res=$command->queryAll();
            return $res[0];
			}break;
		}
		
       
	}
	public function consultarImporteComprasMes($tipo)
	{
		$connection=Yii::app()->getDb();
		$mes=Date('m');
		$ano=Date('Y');
		$sql="
SELECT COUNT(t.idFacturaEntrante) as cantidad, SUM(t.importe) as importe FROM facturasEntrantes_view t WHERE t.condicion='$tipo' AND t.fecha > '$ano-$mes-01' AND t.fecha< '$ano-$mes-31'";

	$command=$connection->createCommand($sql);
            $res=$command->queryAll();
            if($res!=null)
            	return $res[0];
            return false;
			
	}
	public function comparacionMesAnterior()
	{
		$connection=Yii::app()->getDb();
		$mes=Date('m');
		$ano=Date('Y');
		$sql="
SELECT COUNT(t.idFacturaEntrante) as cantidad, SUM(t.importe) as importe FROM facturasEntrantes_view t WHERE t.fecha > '$ano-$mes-01' AND t.fecha< '$ano-$mes-31'";

	$command=$connection->createCommand($sql);
            $res=$command->queryAll();
            if($res!=null)
            	$mesActual= $res[0]['importe'];
            else $mesActual = 0;
       
        //mes anterior
        $mes=Date('m')-1;
		$ano=Date('Y');
		$sql="
SELECT COUNT(t.idFacturaEntrante) as cantidad, SUM(t.importe) as importe FROM facturasEntrantes_view t WHERE t.fecha > '$ano-$mes-01' AND t.fecha< '$ano-$mes-31'";

	$command=$connection->createCommand($sql);
            $res=$command->queryAll();
            if($res!=null)
            	$mesAnt= $res[0]['importe'];
            else $mesAnt = 0;
        
   
        $data['mesActual']=$mesActual;
        $data['mesAnterior']=$mesAnt;
        $data['total']=$mesActual-$mesAnt;
        return $data;
	}
		
       
	
	public function consultarVencidos($dias=0,$todos=false)
	{
		$signo=($dias>0)?'>':'<';
		$connection=Yii::app()->getDb();
		if($todos)
			$sql="
SELECT COUNT(t.idFacturaVencimiento) as cantidad, SUM(t.importe) as importe FROM facturasEntrantes_vencimientos t WHERE t.estado='PEND' ";
else $sql="
SELECT COUNT(t.idFacturaVencimiento) as cantidad, SUM(t.importe) as importe FROM facturasEntrantes_vencimientos t WHERE t.estado='PEND' AND (t.fechaVencimiento $signo CURDATE() AND t.fechaVencimiento<DATE_ADD(CURDATE(),INTERVAL $dias DAY))";
        $command=$connection->createCommand($sql);
            $res=$command->queryAll();
            return $res[0];
	}
	public function consultarEnDeuda()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$sort = new CSort;
        $sort->defaultOrder = 'idFacturaEntrante desc';

		$criteria->compare('t.estado','Debiendo',true);
		
		        $criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('fechaVencimiento',$this->fechaVencimiento,true);
		$criteria->compare('numeroFactura',$this->numeroFactura,true);
		$criteria->compare('precio',$this->precio,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('tipoFactura',$this->tipoFactura,true);

		$criteria->compare('t.estado','<>Pagada',true);
		
		if(isset($_GET['nombre']) && trim($_GET['nombre'])!="")
		$criteria->compare('proveedores.nombre',$_GET['nombre'],true); // That didn't work
		
		
		
		$criteria->select = "t.*,count(gastos.idGasto) as cantidadPagos,ROUND(SUM(gastos.importe),2) as importePagos,  proveedores.nombre as nombreProveedor ";
		$criteria->join = "LEFT JOIN proveedores on proveedores.idProveedor = t.idProveedor ".
		$criteria->join = "LEFT JOIN gastos_factura on gastos_factura.idFacturaSaliente = t.idFacturaEntrante ".
		$criteria->join = "LEFT JOIN gastos on gastos.idGasto = gastos_factura.idGasto ";
		
		$criteria->group='t.idFacturaEntrante';
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort
		));
	}
}