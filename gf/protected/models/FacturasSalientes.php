<?php

/**
 * This is the model class for table "facturasSalientes".
 *
 * The followings are the available columns in table 'facturasSalientes':
 * @property integer $idFacturaSaliente
 * @property integer $idCliente
 * @property string $fecha
 * @property string $numeroFactura
 * @property string $descripcion
 * @property string $estado
 * @property string $tipoFactura
 * @property integer $idCentroCosto
 * @property string $fechaEstimadaCobro
 */
class FacturasSalientes extends CActiveRecord
{
	public $cliente;
	public $pagos;
	public $importeFactura;
	public $nombreFactura;
	public $cuitCliente;
	public $iva21;
	public $iva105;
	public $neto21;
	public $neto105;
	public $esCorriente;
	public $idFacturaSalienteCte;
	public $idOrdenTrabajo;
	public $bonificacion;
	public $idCondicionVenta; //lo uso para facturar, no esta en tabla
	public $nombrePuntoVenta;
	public $numeroSerie;
	public $numFactura;
	public $tipoTalonario;
	public $porcentajeIva;
	public $intereses;
	public $porcentajeInteres;
	public $idTalonario;
        public $esFacturaCredito;
        public $interes;
        public $talonario;
        public $estadoElectronica;
        public $esElectronica;
        public $idVendedor;
	
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return FacturasSalientes the static model class
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
    public static function quitarCaracteresEspeciales($url){
 $url = strtolower($url);
 //Reemplazamos caracteres especiales latinos
 $find = array('á','é','í','ó','ú','â','ê','î','ô','û','ã','õ','ç','ñ');
 $repl = array('a','e','i','o','u','a','e','i','o','u','a','o','c','n');
 $url = str_replace($find, $repl, $url);
 //Añadimos los guiones
 $find = array(' ', '&amp;', '\r\n', '\n','+');
 $url = str_replace($find, '-', $url);
 //Eliminamos y Reemplazamos los demas caracteres especiales
 $find = array('/[^a-z0-9\-&lt;&gt;]/', '/[\-]+/', '/&lt;{^&gt;*&gt;/');
 $repl = array('', '-', '');
 $url = preg_replace($find, $repl, $url);
 return strtoupper($url);
}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'facturasSalientes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idCliente, fecha, numeroFactura,idCondicionVenta, tipoFactura', 'required'),
			array('idCliente,esFacturaCredito,idFacturaSalienteCte, idCentroCosto,idOrdenTrabajo', 'numerical', 'integerOnly'=>true),
			array('numeroFactura,idVendedor,bonificacion,talonarioId,idCondicionVenta,idTalonario', 'length', 'max'=>40),
			array('estado,interes', 'length', 'max'=>20),
			array('tipoFactura', 'length', 'max'=>15),
			array('descripcion', 'length', 'max'=>15000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idFacturaSaliente, idCliente, fecha, numeroFactura, descripcion, estado, tipoFactura, idCentroCosto, fechaEstimadaCobro', 'safe', 'on'=>'search'),
		);
	}
public function getImporteFactura($id)
{
	$items=ItemsFacturaSaliente::model()->consultarItemsFactura($id);
	$importe=0;
	foreach($items as $item)$importe+=$item->importeItem*(($item->porcentajeIva/100)+1);
	return $importe;
}
public function getTextoFactura($idFactura,$tipoImpresion=null,$forma=null)
{
    $fact=FacturasSalientes::model()->findByPk($idFactura);
        	$condicionVenta=CondicionesVenta::model()->findByPk($fact->idCondicionVenta);
        	$cliente= Clientes::model()->findByPk($fact->idCliente);
        	$varFactura=isset($_GET['nombreFactura'])?$_GET['nombreFactura']:'';
        	$nombreCliente = $cliente->apellido.' '. $cliente->nombre.' '. $cliente->razonSocial;
                if($tipoImpresion=="TicketF")
                {
                    $parametros['cliente']= $nombreCliente;
//			($data->fechaIngreso=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fechaIngreso);
			$parametros['fecha']=  Yii::app()->dateFormatter->format("dd-M-y",$fact->fecha);
			
			$parametros['localidad']= 'Comodoro Rivadavia';
			$parametros['condicionIva']=  $cliente->condicionIva;
			$parametros['domicilio']=$cliente->direccion;
			$parametros['celular']=  $cliente->celular;
			$parametros['cuit']=  $cliente->cuit;
                        $parametros['nro']=  $fact->idFacturaSaliente;
                        $tipo=$fact->tipoFactura=="A"?"FACTURA":"TIQUE";
                        $parametros['detalle']=$this->getDetalleFiscal($fact,$tipo);
                        $parametros['pie']='';
                     
                        if($tipo=="TIQUE"){
                            if($parametros['condicionIva']=='Resp.Inscripto'){
                                $cuit=str_replace('-','', $parametros['cuit']);
                                $cuit=str_replace(' ','', $cuit);
                                $texto="@PONEENCABEZADO|5|FACTURA A,";
                                $texto.="@FACTABRE|T|C|B|1|P|10|I|F|$nombreCliente||CUIT|".$cuit."|N|".$parametros['domicilio']."|".$parametros['localidad']."||||C,";

                                $texto.= $this->getDetalleFiscal($fact,'FACTURA').',';

                                $texto.="@FACTCIERRA|T|B|FINAL,";
                            }else{
                            $texto="@TIQUEABRE|C|,";
//                            $texto="@PONEENCABEZADO||5|CIERRE Z,@CIERREZ";
                            $texto.="@PONEENCABEZADO|5|FACTURA B,";
                            $texto.= $this->getDetalleFiscal($fact,$tipo).',';
                            $texto.="@TIQUESUBTOTAL|P|Subtotal,";
                            $texto.="@TIQUECIERRA|T|,";
								
                            }
                        }else{
                            $cuit=str_replace('-','', $parametros['cuit']);
                            $cuit=str_replace(' ','', $cuit);
                            $texto="@PONEENCABEZADO|5|FACTURA A,";
                            $texto.="@FACTABRE|T|C|A|1|P|10|I|I|$nombreCliente||CUIT|".$cuit."|N|".$parametros['domicilio']."|".$parametros['localidad']."||||C,";
                                    
                            $texto.= $this->getDetalleFiscal($fact,$tipo).',';
                           
                            $texto.="@FACTCIERRA|T|A|FINAL,";
                        }
                       
                        $texto=str_replace(',,', ",", $texto);
                        return str_replace("'", '"', $texto);
                }
                if($fact->tipoFactura =='X')
                {
                    $parametros['cliente']= $nombreCliente;
//			($data->fechaIngreso=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fechaIngreso);
			$parametros['fecha']=  Yii::app()->dateFormatter->format("dd-M-y",$fact->fecha);
			$parametros['domicilio']= $cliente->direccion;
			$parametros['localidad']= 'Comodoro Rivadavia';
			$parametros['condicionIva']=  $cliente->condicionIva;
			$parametros['telefono']=  $cliente->telefono;
			$parametros['numero']=  $cliente->nro;
			$parametros['celular']=  $cliente->celular;
			$parametros['cuit']=  $cliente->cuit;
                        $parametros['tipoFactura']=  $fact->tipoFactura;
                        $parametros['site']=  Settings::model()->getValorSistema('DATOS_EMPRESA_SITE');
                        $parametros['telEmpresa']=  Settings::model()->getValorSistema('DATOS_EMPRESA_TELEFONO');
                        $parametros['email']=  Settings::model()->getValorSistema('DATOS_EMPRESA_EMAILADMIN');
                        $parametros['razonSocial']=  Settings::model()->getValorSistema('DATOS_EMPRESA_RAZONSOCIAL');
                        $parametros['ingresosBrutos']=  Settings::model()->getValorSistema('DATOS_EMPRESA_INGBRUTOS');
                        $parametros['inicioActividad']=  Settings::model()->getValorSistema('DATOS_EMPRESA_INICIOACTIVIDAD');
                        $parametros['direccionEmpresa']=  Settings::model()->getValorSistema('DATOS_EMPRESA_DIRECCION');
                        $parametros['resena']=  Settings::model()->getValorSistema('DATOS_EMPRESA_RESENAEMPRESA');
                        $parametros['condicionIvaEmpresa']=  Settings::model()->getValorSistema('DATOS_EMPRESA_CONDICIONIVA');
                        $parametros['nro']=  $fact->idFacturaSaliente;
                        $parametros['detalle']=$this->getDetalleFactura2($fact);
                        $parametros['formaPago']=$this->getFormaPago($idFactura);
                        $parametros['pie']='';
                        $texto= Settings::model()->getValorSistema('IMPRESION_RECIBO_FACTURAX', $parametros, 'impresiones');
                        return str_replace("'", '"', $texto);
                }
        	if ($fact->tipoFactura=='A')
        	{
        	$nombreCliente=$cliente->razonSocial.' '.$cliente->apellido.' '.$cliente->nombre;
        	
        	$detalle=$this->getDetalleFactura($fact);
        	$pie=$this->getPieFactura($fact);
                $cae='No se pudo asignar CAE';
                $fechaCae='No se pudo asignar FECHA CAE';
        	if($forma!=null){
                    $cons=FacturasSalientesRespuestaElectronica::model()->consultar($idFactura);
                    
                    $res=count($cons)>0?$cons[(count($cons)-1)]:false;
                    $cae=$res!=false?$res['cae']:'No se pudo asignar CAE';
                    $fechaCae=$res!=false?$res['fechaVence']:'No se pudo asignar FECHA CAE';
                }
        	$parametros['cliente']= $nombreCliente;
//			($data->fechaIngreso=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fechaIngreso);
			$parametros['fecha']=  Yii::app()->dateFormatter->format("dd-M-y",$fact->fecha);
			$parametros['domicilio']= $cliente->direccion;
			$parametros['localidad']= 'Comodoro Rivadavia';
			$parametros['condicionIva']=  $cliente->condicionIva;
			$parametros['telefono']=  $cliente->telefono;
			$parametros['numero']=  $cliente->nro;
			$parametros['celular']=  $cliente->celular;
			$parametros['cuit']=  $cliente->cuit;
                        $parametros['tipoFactura']=  $fact->tipoFactura;
                        $parametros['site']=  Settings::model()->getValorSistema('DATOS_EMPRESA_SITE');
                        $parametros['telEmpresa']=  Settings::model()->getValorSistema('DATOS_EMPRESA_TELEFONO');
                        $parametros['email']=  Settings::model()->getValorSistema('DATOS_EMPRESA_EMAILADMIN');
                        $parametros['razonSocial']=  Settings::model()->getValorSistema('DATOS_EMPRESA_RAZONSOCIAL');
                        $parametros['ingresosBrutos']=  Settings::model()->getValorSistema('DATOS_EMPRESA_INGBRUTOS');
                        $parametros['inicioActividad']=  Settings::model()->getValorSistema('DATOS_EMPRESA_INICIOACTIVIDAD');
                        $parametros['direccionEmpresa']=  Settings::model()->getValorSistema('DATOS_EMPRESA_DIRECCION');
                        $parametros['resena']=  Settings::model()->getValorSistema('DATOS_EMPRESA_RESENAEMPRESA');
                        $parametros['condicionIvaEmpresa']=  Settings::model()->getValorSistema('DATOS_EMPRESA_CONDICIONIVA');
                        
                        $parametros['factura']=  $fact->numeroFactura;
                       
                        $parametros['_cuitEmpresa']=  Settings::model()->getValorSistema('DATOS_EMPRESA_CUIT');
                        $parametros['cae']=  $cae;
                        $parametros['vencimientoCAE']=  $fechaCae;
                        
                        $parametros['detalle']=$detalle;
                         $parametros['formaPago']=$this->getFormaPago($idFactura);
                        $parametros['pie']="";
                        
                   
			//$cabezal = str_replace("%descripcionOrden", $fact->descripcion,$cabezal);
			if(isset($condicionVenta))
				$parametros['condicionVenta']= $condicionVenta->descripcionVenta;
				else $parametros['condicionVenta']= '-';
			$formaTexto=$forma==null?'FACTURA_A':'FACTURA_ELECTRONICA';
                        $formaTexto=($forma==1)?'IMPRESION_ELECTRONICA':$formaTexto;
			$texto= Settings::model()->getValorSistema($formaTexto, $parametros, 'impresiones');
                        return str_replace("'", '"', $texto);
        	}
               
        	$fact=FacturasSalientes::model()->findByPk($idFactura);
        	$cliente= Clientes::model()->findByPk($fact->idCliente);
        	$nombreCliente=$cliente->razonSocial.' '.$cliente->apellido.' '.$cliente->nombre;
        	
        	$detalle=$this->getDetalleFactura_B($fact);
        	$pie=$this->getPieFactura_b($fact);
                $cae='No se pudo asignar CAE';
                $fechaCae='No se pudo asignar FECHA CAE';
                if($forma!=null){
                    $cons=FacturasSalientesRespuestaElectronica::model()->consultar($idFactura);
                    
                    $res=count($cons)>0?$cons[(count($cons)-1)]:false;
                    $cae=$res!=false?$res['cae']:'No se pudo asignar CAE';
                    $fechaCae=$res!=false?$res['fechaVence']:'No se pudo asignar FECHA CAE';
                }
        	
        	$parametros['cliente']= $nombreCliente;
//			($data->fechaIngreso=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fechaIngreso);
			$parametros['fecha']=  Yii::app()->dateFormatter->format("dd-M-y",$fact->fecha);
			$parametros['domicilio']= $cliente->direccion;
			$parametros['localidad']= 'Comodoro Rivadavia';
			$parametros['condicionIva']=  $cliente->condicionIva;
			$parametros['telefono']=  $cliente->telefono;
			$parametros['numero']=  $cliente->nro;
			$parametros['celular']=  $cliente->celular;
			$parametros['cuit']=  $cliente->cuit;
                       $parametros['tipoFactura']=  $fact->tipoFactura;
                        $parametros['site']=  Settings::model()->getValorSistema('DATOS_EMPRESA_SITE');
                        $parametros['telEmpresa']=  Settings::model()->getValorSistema('DATOS_EMPRESA_TELEFONO');
                        $parametros['email']=  Settings::model()->getValorSistema('DATOS_EMPRESA_EMAILADMIN');
                        $parametros['razonSocial']=  Settings::model()->getValorSistema('DATOS_EMPRESA_RAZONSOCIAL');
                        $parametros['ingresosBrutos']=  Settings::model()->getValorSistema('DATOS_EMPRESA_INGBRUTOS');
                        $parametros['inicioActividad']=  Settings::model()->getValorSistema('DATOS_EMPRESA_INICIOACTIVIDAD');
                        $parametros['direccionEmpresa']=  Settings::model()->getValorSistema('DATOS_EMPRESA_DIRECCION');
                        $parametros['resena']=  Settings::model()->getValorSistema('DATOS_EMPRESA_RESENAEMPRESA');
                        $parametros['condIvaEmpresa']=  Settings::model()->getValorSistema('DATOS_EMPRESA_CONDICIONIVA');
                        
                        $parametros['factura']=  $fact->numeroFactura;
                       
                        $parametros['_cuitEmpresa']=  Settings::model()->getValorSistema('DATOS_EMPRESA_CUIT');
                        $parametros['cae']=  $cae;
                        $parametros['vencimientoCAE']=  $fechaCae;
                        
                        
                         $parametros['formaPago']=$this->getFormaPago($idFactura);
                        $parametros['detalle']=$detalle;
                        $parametros['pie']='';
                        
                   
			//$cabezal = str_replace("%descripcionOrden", $fact->descripcion,$cabezal);
			if(isset($condicionVenta))
				$parametros['condicionVenta']= $condicionVenta->descripcionVenta;
				else $parametros['condicionVenta']= '-';
                        $formaTexto=$forma==null?'FACTURA_A':'FACTURA_ELECTRONICA';
                        $formaTexto=($forma==1)?'IMPRESION_ELECTRONICA':$formaTexto;
			$texto= Settings::model()->getValorSistema($formaTexto, $parametros, 'impresiones');
                        return str_replace("'", '"', $texto);
}
private function getTextoTicketB()
{
    $text="@FACTABRE|T|C|B|1|P|10|I|F|JUAN PEREZ||NDOC|99999995|N|MEXICO 564|||Remito 01-2345||C
   
@FACTITEM|Mouse Genius XScrol|1.0|4.51|0.105|M|1|0||||0|0
@FACTITEM|Patchcord Cat.5E Gr|5.0|4.96|0.210|M|1|0||||0|0
@FACTITEM|Microfono NG-H300 N|1.0|4.99|0.210|M|1|0||||0|0
@FACTITEM|Mouse Genius Netscr|1.0|4.55|0.105|M|1|0||||0|0
@FACTITEM|Ventilador Cyber Co|2.0|4.99|0.210|M|1|0||||0|0
@FACTITEM|Lector 3.5 MultiCar|2.0|5.11|0.210|M|1|0||||0|0
@FACTITEM|Teclado Noganet Esp|2.0|4.75|0.105|M|1|0||||0|0
@FACTITEM|Antena SMA Kozumi W|2.0|5.24|0.210|M|1|0||||0|0
@FACTITEM|Teclado Ecovision W|1.0|4.85|0.105|M|1|0||||0|0
@FACTITEM|Limpiador para Pant|1.0|5.37|0.210|M|1|0||||0|0
@FACTITEM|Auricular Genius Mo|1.0|5.40|0.210|M|1|0||||0|0

** Se efectua un descuento
@FACTPAGO|DESCUENTO 10%|9.46|D

@FACTPAGO|PAGO|100.00|T

@FACTCIERRA|T|B|FINAL";
    return $text;
}
private function getFormaPago($id)
{
    $salida="";
    $sql="SELECT t.*,formasDePago.*,formasDePago.nombreForma from ordenesCobroFacturas t left 
    join ordenesCobro on ordenesCobro.idOrdenCobro= t.idOrdenCobro
    left join formasDePago on formasDePago.idFormaPago = ordenesCobro.idFormaPago
    WHERE t.idFacturaSaliente='$id'";
    $connection=Yii::app()->getDb();
    $command=$connection->createCommand($sql);
            
     $res=$command->queryAll();
     foreach ($res as $key => $value) {
         $salida.=$value['nombreForma'].' ';
     }
     if($salida=="") return 'PENDIENTE (a cta cte)'; 
    return $salida;
}
    public function getFacturaPagarCuenta($idCliente,$importeCuenta)
    {
            $pendientes=$this->consultarPendientesPago($idCliente);
            return count($pendientes)>0?$pendientes[0]:'no';
    }
    public function consultarPendientesPago($idCliente)
    {
        $sql="SELECT t.*, fs.idFacturaVencimiento from facturasSalientes_view t
        LEFT JOIN facturasSalientesVencimiento fs on fs.idFacturaSaliente = t.idFacturaSaliente
        where t.idCliente='$idCliente' AND t.estado='PEND' order by t.importeFactura desc";
        $connection=Yii::app()->getDb();
        $command=$connection->createCommand($sql);
        return $command->queryAll();
    }
public function getTextoNotaCredito($idFactura,$tipoImpresion=null)
{
    $fact=FacturasSalientes::model()->findByPk($idFactura);
        	$condicionVenta=CondicionesVenta::model()->findByPk($fact->idCondicionVenta);
        	$cliente= Clientes::model()->findByPk($fact->idCliente);
        	$varFactura=isset($_GET['nombreFactura'])?$_GET['nombreFactura']:'';
        	$nombreCliente = isset($cliente->condicionIva)?$cliente->condicionIva:'';
                if($tipoImpresion=="TicketF")
                {
                    $parametros['cliente']= $nombreCliente;
//			($data->fechaIngreso=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fechaIngreso);
			$parametros['fecha']=  Yii::app()->dateFormatter->format("dd-M-y",$fact->fecha);
			
			$parametros['localidad']= 'Comodoro Rivadavia';
			$parametros['condicionIva']=  $cliente->condicionIva;
			$parametros['domicilio']=$cliente->direccion;
			$parametros['celular']=  $cliente->celular;
			$parametros['cuit']=  $cliente->cuit;
                        $parametros['nro']=  $fact->idFacturaSaliente;
                        $tipo=$fact->tipoFactura=="A"?"FACTURA":"TIQUE";
                        $parametros['detalle']=$this->getDetalleFiscal($fact,$tipo);
                        $parametros['pie']='';
                        
                        switch ($fact->tipoFactura) {
                            case 'A':{
                                $cuit=str_replace('-','', $parametros['cuit']);
                                $cuit=str_replace(' ','', $cuit);
                                $texto="@PONEENCABEZADO|5|NOTA DE CREDITO A,";
                                $texto.="@FACTABRE|M|C|A|1|P|10|I|I|$nombreCliente||CUIT|$cuit|N|".$parametros['domicilio']."|||".$fact->numeroFactura."||C,";
                                $texto.= $this->getDetalleFiscal($fact,$tipo);
                                $texto.="@FACTCIERRA|M|A|FINAL,";
                            }
                            break;
                        case 'B':{
                                $texto="@PONEENCABEZADO|5|NOTA DE CREDITO A,";
                                $texto.="@FACTABRE|M|C|B|1|P|10|I|F|$nombreCliente||NDOC|99999995|N|".$parametros['domicilio']."|||".$fact->numeroFactura."||C,";
                                $texto.= $this->getDetalleFiscal($fact,'CREDITOB');
                                $texto.="@FACTCIERRA|M|B|FINAL,"; 
                            }
                                break;
                        }
                        $texto=str_replace(',,', ",", $texto);
                        return str_replace("'", '"', $texto);
                }
                if($fact->tipoFactura =='X')
                {
                    $parametros['cliente']= $nombreCliente;
//			($data->fechaIngreso=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fechaIngreso);
			$parametros['fecha']=  Yii::app()->dateFormatter->format("dd-M-y",$fact->fecha);
			$parametros['domicilio']= $cliente->direccion;
			$parametros['localidad']= 'Comodoro Rivadavia';
			$parametros['condicionIva']=  $cliente->condicionIva;
			$parametros['telefono']=  $cliente->telefono;
			$parametros['numero']=  $cliente->nro;
			$parametros['celular']=  $cliente->celular;
			$parametros['cuit']=  $cliente->cuit;
                        $parametros['nro']=  $fact->idFacturaSaliente;
                        $parametros['detalle']=$this->getDetalleFactura2($fact);
                        $parametros['pie']='';
                        $texto= Settings::model()->getValorSistema('IMPRESION_RECIBO_FACTURAX', $parametros, 'impresiones');
                         $texto=str_replace(',,', ",", $texto);
                        return str_replace("'", '"', $texto);
                }
        	if ($fact->tipoFactura=='A')
        	{
        	$nombreCliente=$cliente->razonSocial.' '.$cliente->apellido.' '.$cliente->nombre;
        	
        	$detalle=$this->getDetalleFactura($fact);
        	$pie=$this->getPieFactura($fact);
        	
        	$parametros['cliente']= $nombreCliente;
//			($data->fechaIngreso=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fechaIngreso);
			$parametros['fecha']=  Yii::app()->dateFormatter->format("dd-M-y",$fact->fecha);
			$parametros['domicilio']= $cliente->direccion;
			$parametros['localidad']= 'Comodoro Rivadavia';
			$parametros['condicionIva']=  $cliente->condicionIva;
			$parametros['telefono']=  $cliente->telefono;
			$parametros['numero']=  $cliente->nro;
			$parametros['celular']=  $cliente->celular;
			$parametros['cuit']=  $cliente->cuit;
                        $parametros['detalle']=$detalle;
                        $parametros['pie']="";
                        
                   
			//$cabezal = str_replace("%descripcionOrden", $fact->descripcion,$cabezal);
			if(isset($condicionVenta))
				$parametros['condicionVenta']= $condicionVenta->descripcionVenta;
				else $parametros['condicionVenta']= '-';
			
			$texto= Settings::model()->getValorSistema('FACTURA_A', $parametros, 'impresiones');
			 $texto=str_replace(',,', ",", $texto);
                        return str_replace("'", '"', $texto);
        	}
        	$fact=FacturasSalientes::model()->findByPk($idFactura);
        	$cliente= Clientes::model()->findByPk($fact->idCliente);
        	$nombreCliente=$cliente->razonSocial.' '.$cliente->apellido.' '.$cliente->nombre;
        	
        	$detalle=$this->getDetalleFactura_B($fact);
        	$pie=$this->getPieFactura_b($fact);
        	
        	$parametros['cliente']= $nombreCliente;
//			($data->fechaIngreso=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fechaIngreso);
			$parametros['fecha']=  Yii::app()->dateFormatter->format("dd-M-y",$fact->fecha);
			$parametros['domicilio']= $cliente->direccion;
			$parametros['localidad']= 'Comodoro Rivadavia';
			$parametros['condicionIva']=  $cliente->condicionIva;
			$parametros['telefono']=  $cliente->telefono;
			$parametros['numero']=  $cliente->nro;
			$parametros['celular']=  $cliente->celular;
			$parametros['cuit']=  $cliente->cuit;
                        $parametros['detalle']=$detalle;
                        $parametros['pie']='';
                        
                   
			//$cabezal = str_replace("%descripcionOrden", $fact->descripcion,$cabezal);
			if(isset($condicionVenta))
				$parametros['condicionVenta']= $condicionVenta->descripcionVenta;
				else $parametros['condicionVenta']= '-';
                                
			$texto= Settings::model()->getValorSistema('FACTURA_A', $parametros, 'impresiones');
                        $texto=str_replace(',,', ",", $texto);
                        return str_replace("'", '"', $texto);
}
private function getDetalleFactura_B($fact)
	{
		$salida="<table style='font-family:Arial; font-size:8pt;text-align: left; height: 72px'>";
		$salida.="<tr>" .
					"	<td>Cant.</td>".
					"	<td>Detalle</td>".
					
					"	<td>Final</td>".
					"</tr>";
		$itemsFactura=ItemsFacturaSaliente::model()->itemsFacturaImpresion($fact->idFacturaSaliente);
		$items=$itemsFactura;
                $iva21=0;
                $iva105=0;
                $subTotal=0;
                $total=0;
		foreach($items as $item){
			
			
                        $iva=$item['porcentajeIva']==0?1:($item['porcentajeIva']/100)+1;
                        $importeNeto=round($item['importeItem'],Settings::model()->getValorSistema('DECIMALES_FACTURAS'))*$item['cantidad'];
                         $final=round($item['importeItem']*$iva,Settings::model()->getValorSistema('DECIMALES_FACTURAS'))*$item['cantidad'];
                        $subTotal+=$importeNeto;
                        $total+=$final;
                        if($item['porcentajeIva']==21) $iva21+=$final-$importeNeto; else $iva105+=$final-$importeNeto;
                       
			$salida.="<tr>" .
					"	<td>".$item['cantidad']."</td>".
					"	<td>".$item['nombreItem']."</td>".
					
					"	<td>".number_format($final,Settings::model()->getValorSistema('DECIMALES_FACTURAS'))."</td>".
					"</tr>";
		}
                $salida.="<tr>" .
					"	<td></td>".
					"	<td></td>".
					"	<td></td>".
					"	<td>TOTAL ".Yii::app()->numberFormatter->formatCurrency($total,"$")."</td>".
					
					"</tr>";
		$salida.="</table>";
		return $salida;	
	}
        
        private function getDetalleFiscal($fact,$tipo)
	{
		$salida="";
		$itemsFactura=ItemsFacturaSaliente::model()->itemsFacturaImpresion($fact->idFacturaSaliente);
		$items=$itemsFactura;
                $iva21=0;
                $iva105=0;
                $subTotal=0;
                $total=0;
		foreach($items as $item){
                    $importeNeto=$item['importeItem']*$item['cantidad'];
                        $iva=$item['porcentajeIva']==0?1:($item['porcentajeIva']/100)+1;
                        $final=$importeNeto*$iva;
                        
                        $subTotal+=$importeNeto;
                        $total+=$final;
                        
			$importe=($item['importeItem'])*(($item['porcentajeIva']/100)+1);
                        
			$importeNeto=($item['importeItem']==0)?'0':$importe;
                        $importeNeto=($tipo=="FACTURA")?($item['importeItem']):$importe;
                        $cant=$item['cantidad'];
                        $por=$item['porcentajeIva'];
                        $imp=number_format($importeNeto*$item['cantidad'],2);
			$salida.=$this->getItemFiscal($tipo,$item['nombreItem'],number_format($importeNeto, 2),$item['cantidad'],$item['porcentajeIva']);
			
		}
		
		return $salida;
	}
        private function normaliza ($cadena){
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ
ßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuy
bsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtoupper($cadena);
    return utf8_encode($cadena);
}
        private function getItemFiscal($tipo,$item,$importe,$cantidad,$iva)
        {
            $item=str_replace(",", "", $item);
            $item=str_replace("/", "", $item);
            $item=str_replace("\\", "", $item);
            $item=str_replace(".", "", $item);
            $item=str_replace("-", "", $item);
            $item=str_replace("_", "", $item);
            $item=str_replace("@", "", $item);
            $item=str_replace("'", "", $item);
            $item=str_replace('"', "", $item);
            $importe=str_replace(',', "", $importe);
            $cantidad=str_replace(',', "", $cantidad);
            $iva=str_replace(',', "", $iva);
            $item=$this->normaliza($item);
            $item=substr($item, 0, 20);
            $sal="";
            if($importe<0)
            	if($tipo=="TIQUE")
            		$sal= "@TIQUEPAGO|DESCUENTO |".( number_format(-$importe, 2))."|D,";
            	else $sal= "@FACTPAGO|DESCUENTO |".( number_format(-$importe, 2))."|D,";
                 
            else{
            if($tipo=="CREDITOB"){
                $iva=$iva/100;
                $iva=substr($iva, 1, strlen($iva));
                $sal= "@FACTITEM|$item|$cantidad|$importe|$iva|M|1|0||||0|0,";
            }
            if($tipo=="TIQUE"){
                $iva=$iva/100;
                $iva=substr($iva, 1, strlen($iva));
                $sal= "@TIQUEITEM|$item|    $cantidad|      $importe|  $iva|M|1|0|0|,";
            }
           
            else {
                $iva=$iva/100;
                $sal= "@FACTITEM|$item|$cantidad|$importe|$iva|M|1|0||||0|0,";
            }
            }
            
            return $sal;  
        }
        private function getDetalleFactura2($fact)
	{
		$salida="<br>";
		$itemsFactura=ItemsFacturaSaliente::model()->itemsFacturaImpresion($fact->idFacturaSaliente);
		$items=$itemsFactura;
                $iva21=0;
                $iva105=0;
                $subTotal=0;
                $total=0;
		foreach($items as $item){
                    
                        $iva=$item['porcentajeIva']==0?1:($item['porcentajeIva']/100)+1;
                        $importeNeto=($item['importeItem'])*$item['cantidad'];
                        $final=round($item['importeItem']*$iva,Settings::model()->getValorSistema('DECIMALES_FACTURAS'))*$item['cantidad'];
                         
                        $subTotal+=$importeNeto;
                        $total+=$final;
			$importe=($item['importeItem'])/(($item['porcentajeIva']/100)+1);
			
                        $cant=$item['cantidad'];
                        $por=$item['porcentajeIva'];
                        $imp=number_format($importeNeto*$item['cantidad'],Settings::model()->getValorSistema('DECIMALES_FACTURAS'));
			$salida.="" .
			
					"	$cant - ".$item['nombreItem']."$ $importeNeto ($por %) $ ".number_format($final, Settings::model()->getValorSistema('DECIMALES_FACTURAS'))." <br>
                                ";
		}
                $salida.="<br>SUB-TOTAL $ ".number_format(($subTotal), Settings::model()->getValorSistema('DECIMALES_FACTURAS')).'<br>';
                $salida.="TOTAL $ ".number_format($total, Settings::model()->getValorSistema('DECIMALES_FACTURAS'));
		return $salida;
	}
private function getDetalleFactura($fact)
	{
		$salida="<table style='font-family:Arial; font-size:8pt;text-align: left; height: 72px'>";
		$salida.="<tr>" .
					"	<td>Cant.</td>".
					"	<td width='350'>Detalle</td>".
					"	<td>%I.v.a</td>".
					"	<td>Unitario</td>".
					"	<td>Neto</td>".
					"	<td>Final</td>".
					"</tr>";
		$itemsFactura=ItemsFacturaSaliente::model()->itemsFacturaImpresion($fact->idFacturaSaliente);
		$items=$itemsFactura;
                $iva21=0;
                $iva105=0;
                $subTotal=0;
                $total=0;
		foreach($items as $item){
			
			
                        $iva=$item['porcentajeIva']==0?1:($item['porcentajeIva']/100)+1;
                        $importeNeto=round($item['importeItem'],Settings::model()->getValorSistema('DECIMALES_FACTURAS'))*$item['cantidad'];
                        $final=round($item['importeItem']*$iva,Settings::model()->getValorSistema('DECIMALES_FACTURAS'))*$item['cantidad'];
                        $subTotal+=$importeNeto;
                        $total+=$final;
                        if($item['porcentajeIva']==21) $iva21+=$final-$importeNeto; else $iva105+=$final-$importeNeto;
                       
			$salida.="<tr>" .
					"	<td>".$item['cantidad']."</td>".
					"	<td>".$item['nombreItem']."</td>".
					"	<td>".$item['porcentajeIva']."</td>".
					"	<td>".number_format($item['importeItem'],Settings::model()->getValorSistema('DECIMALES_FACTURAS'))."</td>".
					"	<td>".number_format($importeNeto,Settings::model()->getValorSistema('DECIMALES_FACTURAS'))."</td>".
					"	<td>".number_format($final,Settings::model()->getValorSistema('DECIMALES_FACTURAS'))."</td>".
					"</tr>";
		}
                $salida.="<tr>" .
					"	<td>IVA 10.5 % $ ".number_format($iva105,Settings::model()->getValorSistema('DECIMALES_FACTURAS'))."</td>".
					"	<td>IVA 21 % $ ".number_format($iva21,Settings::model()->getValorSistema('DECIMALES_FACTURAS'))."</td>".
					"	<td></td>".
					"	<td></td>".
					"	<td>SUB-TOTAL $ ".number_format($subTotal,Settings::model()->getValorSistema('DECIMALES_FACTURAS'))."</td>".
					"	<td>TOTAL $ ".number_format($total,Settings::model()->getValorSistema('DECIMALES_FACTURAS'))."</td>".
					"</tr>";
		$salida.="</table>";
		return $salida;
	}
private function getPieFactura2($fa)
	{
    $val="";
		$model=FacturasSalientes::model();
		$model->idFacturaSaliente=$fa->idFacturaSaliente;
		$datos=$model->search()->getData();
		
			$val =  "<br>SUB TOTAL $". number_format(($datos[0]->iva21/1.21)+($datos[0]->iva105/1.105),2);
			$val =  "<br>TOTAL $". number_format($datos[0]->importeFactura,2);
		return $val;
	}
        private function getPieFactura_b($fa)
	{
		$model=FacturasSalientes::model();
		$model->idFacturaSaliente=$fa->idFacturaSaliente;
		$datos=$model->search()->getData();
                $iva21=number_format(($datos[0]->iva21/1.21)*0.21,2);
                $iva105=number_format(($datos[0]->iva105/1.105)*0.105,2);
                $sub=number_format(($datos[0]->iva21/1.21)+($datos[0]->iva105/1.105),2);
                $tot=number_format($datos[0]->importeFactura,2);
		$sal="<table>";
                $sal.=" <tr>";
                $sal.=" <td>TOTAL</td>";
                $sal.=" <td>$tot</td>";
                $sal.=" </tr>";
                $sal.='</table>';
		return $sal;
	}
        private function getPieFactura($fa)
	{
		$model=FacturasSalientes::model();
		$model->idFacturaSaliente=$fa->idFacturaSaliente;
		$datos=$model->search()->getData();
                $iva21=number_format(($datos[0]->iva21/1.21)*0.21,2);
                $iva105=number_format(($datos[0]->iva105/1.105)*0.105,2);
                $sub=number_format(($datos[0]->iva21/1.21)+($datos[0]->iva105/1.105),2);
                $tot=number_format($datos[0]->importeFactura,2);
		$sal="<table>";
                $sal.=" <tr>";
                $sal.=" <td>IVA 21%</td>";
                $sal.=" <td>$iva21</td>";
                $sal.=" <td>SUB TOTAL</td>";
                $sal.=" <td>$sub</td>";
                $sal.=" </tr>";
                
                $sal.=" <tr>";
                $sal.=" <td>IVA 10.5%</td>";
                $sal.=" <td>$iva105</td>";
                $sal.=" <td>TOTAL</td>";
                $sal.=" <td>$tot</td>";
                $sal.=" </tr>";
                $sal.='</table>';
		return $sal;
	}
public function beforeDelete()
{   
  	  
      
$criteria=new CDbCriteria;
$criteria->select = ' * ';  // only select the 'title' column
$criteria->condition = ' idFacturaSaliente=:idFacturaSaliente ';
$criteria->params=array(':idFacturaSaliente'=>$this->idFacturaSaliente);
$items=ItemsFacturaSaliente::model()->findAll($criteria);


//      return parent::beforeDelete();
//       // SI SE PIUEDE ELIMINAR DEVOLVER TRUE; SINO DEVOLVER FALSE      
//$arr = array();
for($i=0;count($items)>$i;$i++)
{
	
// 	  $modeloDisponible = new StockDisponible;
//      $modeloDisponible->idStock =  $items[$i]->idElemento;
//      $modeloDisponible->cantidadDisponible =  $items[$i]->idElemento;
//      $modeloDisponible->save();

///idElemento
$criteria=new CDbCriteria;
$criteria->select = ' * ';  // only select the 'title' column
$criteria->condition = ' idStock=:idStock ';
$criteria->params=array(':idStock'=>$items[$i]->idElemento);
$criteria->order='t.idStockDisponible desc';
$disponibles=StockDisponible::model()->find($criteria);

if($this->esFacturaCredito==1){
        $disponibles->cantidadDisponible = $disponibles->cantidadDisponible - $items[$i]->cantidad;
	$disponibles->update();
}else{
        $disponibles->cantidadDisponible = $disponibles->cantidadDisponible + $items[$i]->cantidad;
	$disponibles->update();
}

	

}


 

      return parent::beforeDelete();
  }
  
public  function afterSave()
	{
		parent::afterSave();
  	if (isset($this->idTalonario))
  	{
  		$connection=Yii::app()->getDb();
        $command=$connection->createCommand("
	UPDATE `talonario` SET `proximo` = lpad(proximo+1,8,'0') WHERE `talonario`.`idTalonario` =".$this->idTalonario);
           
        $command->execute(); 
  	}
  	
  
  		return parent::afterSave();
  }
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		'itemsFacturaSaliente'=>array(self::HAS_MANY,'itemsFacturaSaliente','idFacturaSaliente'),
		'clientes'=>array(self::HAS_ONE, 'clientes', 'idCliente'),
		//'clientes'=>array(self::HAS_ONE, 'Clientes', 'idClienteEmpresa','through'=>'mantenimientosEmpresas'),
		);
	}
	public function chequearEstado($idFactura)
	{
		$vencimientos=FacturasSalientesVencimiento::model()->consultarVencimientos($idFactura);
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
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idFacturaSaliente' => 'Id Factura Saliente',
			'idCliente' => 'Cliente',
			'fecha' => 'Fecha',
			'numeroFactura' => 'Numero Factura',
			'descripcion' => 'Descripcion',
			'estado' => 'Estado',
			'tipoFactura' => 'Tipo Factura',
			'idCentroCosto' => 'Centro de Costo',
			'fechaEstimadaCobro' => 'Fecha Estimada Cobro',
			'importeFactura' => '$ FINAL',
		'bonificacion'=>'Bonificacion',
                    'idVendedor'=>'Vendedor',
                    'talonarioId'=>'Talonario',
		'idCondicionVenta'=>'Condicion de Venta',
		);
	}
	public function getEstados()
	{
    	return array('PEND' => 'PEND','CANC' => 'CANC');
	}
	public function getTipos()
	{
    	return array('A' => 'A', 'B' => 'B', 'C' => 'C', 'X' => 'X');
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function consultarUnica($idFactura)
	{
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand("
SELECT * from facturasSalientes_view WHERE idFacturaSaliente = $idFactura");
            $res=$command->queryAll();
        
            return isset($res[0])?$res[0]:null;
	}

	public function consultarFacturasOrden($idOrdenTrabajo)
	{
		$orden=OrdenesTrabajo::model()->findByPk($idOrdenTrabajo);
		$criteria=new CDbCriteria;
		
		$sort = new CSort;
        $sort->defaultOrder = 'idFacturaSaliente desc';

		$criteria->compare('t.idCliente',$orden->idCliente);
		$criteria->select = "t.*,clientes.cuit as cuitCliente,
		CONCAT('Nro ',t.numeroFactura,' - Importe $ ', ROUND(SUM(itemsFacturaSaliente.importeItem*itemsFacturaSaliente.cantidad),2),' - ',t.fecha) as nombreFactura, 
		
		IF(clientes.tipoCliente='Empresa',clientes.razonSocial,
		CONCAT(clientes.apellido,', ',clientes.nombre)) as cliente";
		$criteria->join = "LEFT JOIN clientes on clientes.idCliente = t.idCliente ".
		"LEFT JOIN pagosFactura on pagosFactura.idFacturaSaliente = t.idFacturaSaliente ".
		"LEFT JOIN pagos on pagos.idPago = pagosFactura.idPago ".
		"LEFT JOIN itemsFacturaSaliente on itemsFacturaSaliente.idFacturaSaliente = t.idFacturaSaliente "
		;
		$criteria->group='t.idFacturaSaliente';
		$criteria->order='t.idFacturaSaliente desc';
//		
		return self::model()->findAll($criteria);
	}
	public function consultarFacturasCliente($idCliente)
	{
		$criteria=new CDbCriteria;
		
		$sort = new CSort;
        $sort->defaultOrder = 'idFacturaSaliente desc';

		$criteria->compare('t.idCliente',$idCliente);
		$criteria->select = "t.*,clientes.cuit as cuitCliente,
		CONCAT('Importe $ ', ROUND(SUM(itemsFacturaSaliente.importeItem),2),' - ',t.fecha) as nombreFactura, 
		SUM(itemsFacturaSaliente.importeItem*itemsFacturaSaliente.cantidad) as importeFactura,
		SUM(pagos.importeDinero) as pagos,IF(clientes.tipoCliente='Empresa',clientes.razonSocial,
		CONCAT(clientes.apellido,', ',clientes.nombre)) as cliente";
		$criteria->join = "LEFT JOIN clientes on clientes.idCliente = t.idCliente ".
		"LEFT JOIN pagosFactura on pagosFactura.idFacturaSaliente = t.idFacturaSaliente ".
		"LEFT JOIN pagos on pagos.idPago = pagosFactura.idPago ".
		"LEFT JOIN itemsFacturaSaliente on itemsFacturaSaliente.idFacturaSaliente = t.idFacturaSaliente "
		;
//		$criteria->group='t.idFacturaSaliente';
		$res= new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort,'pagination'=>array(
        'pageSize'=>2000,
    ),
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
		if($tipoLibro=='ANULADA')
                    $sql="SELECT t.*,clientes.cuit FROM facturasSalientes_view t LEFT JOIN clientes on clientes.idCliente = t.idCliente WHERE t.fecha BETWEEN '$fechaInicio 00:00:00' AND '$fechaFin 00:00:00' AND t.estado='$tipoLibro'";
                else $sql="SELECT t.*,clientes.cuit FROM facturasSalientes_view t LEFT JOIN clientes on clientes.idCliente = t.idCliente WHERE t.fecha BETWEEN '$fechaInicio 00:00:00' AND '$fechaFin 00:00:00' AND t.estado<>'ANULADA' AND t.tipoFactura='$tipoLibro'";
                $connection=Yii::app()->getDb();
                $command=$connection->createCommand($sql);
//            echo $sql;
                return $command->queryAll();

	}
    public function getTextoAlicuotaVentas($fechaInicio,$fechaFin)
    {
        $sql="SELECT * FROM facturas t LEFT JOIN talonario on talonario.idTalonario = t.idTalonario LEFT JOIN clientes on clientes.idCliente = t.idCliente WHERE t.fecha BETWEEN '$fechaInicio 00:00:00' AND '$fechaFin 00:00:00' AND t.estado<>'ANULADA' AND talonario.letraTalonario<>'X'  group by nroFactura";
                $connection=Yii::app()->getDb();
                $command=$connection->createCommand($sql);

                $texto="";
                $res= $command->queryAll();
                $i=0;
                foreach ($res as $value){
                    $i++;
                    $texto.=$this->getLineaAlicuotaVenta($value,($i==count($res)));
                    
                }
                    
                return $texto;

    }
        public function getTextoCitiVentas($fechaInicio,$fechaFin)
	{
		$sql="SELECT * FROM facturas t LEFT JOIN talonario on talonario.idTalonario = t.idTalonario LEFT JOIN clientes on clientes.idCliente = t.idCliente WHERE t.fecha BETWEEN '$fechaInicio 00:00:00' AND '$fechaFin 00:00:00' AND t.estado<>'ANULADA' AND talonario.letraTalonario<>'X' group by nroFactura";
                $connection=Yii::app()->getDb();
                $command=$connection->createCommand($sql);

                $texto="";
                $res= $command->queryAll();
                $i=0;
                foreach ($res as $value){
                    $i++;
                    $texto.=$this->getLineaCitiVentas2($value,($i==count($res)));
                    
                }
                    
                return $texto;

	}
    private function getLineaAlicuotaVenta($datos,$ultimo)
    {
        $nroFactura=str_pad($datos['nroFactura'],20,'0', STR_PAD_LEFT);
        $importeNeto=number_format($datos['importe']/1.21,2,'','');
        $importeTotal=number_format($datos['importe'],2,'','');
        $importeLiquidado=number_format(($datos['importe']/1.21)*0.21,2,'','');
        if($datos['estado']=="ANULADA"){
            $importeNeto=number_format(0,2,'','');
           $importeTotal=number_format(0,2,'','');
           $importeLiquidado=number_format(0,2,'','');
          }
        $alicuota='0005';
        $esConsumidorFinal= $this->esConsumidorFinal($datos['idCliente']);
        $linea=$this->getTipoComprobante($datos['idTalonario'],$esConsumidorFinal); // TIPO DE COMPROBANTE (3)
        $linea.=$datos['idTalonario']=='0'?'00001':$this->getPuntoVenta($datos['idTalonario']); // PUNTO DE VENTA (5)
        $linea.=$nroFactura.''; // NRO FACTURA DESDE  (20)
        $linea.=str_pad($importeNeto,15,'0', STR_PAD_LEFT).''; // importe de la factura total 15
        $linea.=str_pad($alicuota,4,'0', STR_PAD_LEFT).''; // importe de la factura total 15
        $linea.=str_pad($importeLiquidado,15,'0', STR_PAD_LEFT).''; // importe de la factura total 15
        $linea.=CHR(10); // salto de pagina
         
            return $linea;

    }
     private function getLineaCitiVentas2($datos,$ultimo)
        {
            $tal=Talonario::model()->findByPk($datos['idTalonario']);
            $cliente=Clientes::model()->findByPk($datos['idCliente']);
					$razonSocial=isset($cliente)?$cliente->razonSocial:"CONS-FINAL(d)";
            $fecha=explode(' ', $datos['fecha']);
            $nroFactura=str_pad($datos['nroFactura'],20,'0', STR_PAD_LEFT);
            $esConsumidorFinal= $this->esConsumidorFinal($datos['idCliente']);
            $cuit=str_replace(' ','',str_replace('-', '', $datos['cuit']));
            $codigoDocumento=$this->getTipoDocCliente($tal->letraTalonario,$datos['idCliente']); // no se que numero poner cuando no es factura A ni B
           
           $importeNeto=number_format($datos['importe']/1.21,2,'','');
           $importeTotal=number_format($datos['importe'],2,'','');
           $importeLiquidado=number_format(($datos['importe']/1.21)*0.21,2,'','');
          
          if($datos['estado']=="ANULADA"){
            $importeNeto=number_format(0,2,'','');
           $importeTotal=number_format(0,2,'','');
           $importeLiquidado=number_format(0,2,'','');
          }
            $linea=str_replace('-', '', $fecha[0]); // FECHA (8)
            $linea.=$this->getTipoComprobante($datos['idTalonario'],$esConsumidorFinal); // TIPO DE COMPROBANTE (3)
            
            $linea.=$datos['idTalonario']=='0'?'00001':$this->getPuntoVenta($datos['idTalonario']); // PUNTO DE VENTA (5)
            $linea.=$nroFactura.''; // NRO FACTURA DESDE  (20)
            $linea.=$nroFactura.''; // NRO FACTURA HASTA (20)
            $linea.=$codigoDocumento.''; // CODIGO DOCUMENTO(2)
            $nro=str_pad($cuit,20,'0',STR_PAD_LEFT);
            if(($nro*1)==0)$nro=str_replace('0', '1', $nro);
            
            $linea.=str_pad($nro,20,'0').''; // NRO DOCUMENTO (20)
            $linea.=str_pad(substr(FacturasSalientes::quitarCaracteresEspeciales($razonSocial), 0,30), 30).'';  // NOMBRE CLIENTE (30)

            $linea.=str_pad($importeTotal,15,'0', STR_PAD_LEFT).''; // importe de la factura total 15
            $linea.=''.str_pad(0,15,'0', STR_PAD_LEFT).''; // importe de la factura NETO 15
            $linea.=str_pad(0,15,'0', STR_PAD_LEFT).''; // importe de la factura NETO 15
            $linea.=''.str_pad(0,15,'0', STR_PAD_LEFT).''; // impuesto liquidado 15
            $linea.=str_pad('0',15,'0', STR_PAD_LEFT).''; // importe liquidado RNI NO INFORMADO 15
            $linea.=str_pad('0',15,'0', STR_PAD_LEFT).''; // impoirte  exentas 15
            $linea.=str_pad('0',15,'0', STR_PAD_LEFT).''; // impoirte  exentas 15
            $linea.=str_pad('0',15,'0', STR_PAD_LEFT).''; // impoirte  exentas 15
            
            $linea.='PES'; // cantidad de alicuotas 1
            
            $linea.="0001000000";//tipo de cambio
            $linea.="1"; //cantidad alicuotas
            $linea.=" "; //codigo op
            $linea.=str_pad('0',15,'0', STR_PAD_LEFT).''; // 
            $linea.=str_pad('0',8,'0', STR_PAD_LEFT).''; // 
            //$linea.=CHR(10); // salto de pagina
            $linea.="\n";
         
            return $linea;
            
        }
        private function esConsumidorFinal($idCliente)
        {
            $idcons=Settings::model()->getValorSistema('IDCLIENTE_CONSUMIDORFINAL')+0;
            $idCliente=$idCliente+0;
            return $idCliente==$idcons;
        }
        private function getLineaCitiVentas($datos,$ultimo)
        {
            $importeBase=number_format($datos['iva105']+$datos['iva21'],2,'','')+'';
           $importeTotal=number_format($datos['importeFactura'],2,'','')+'';
           $importeNeto=number_format($datos['iva21']+$datos['iva105'],2,'','')+'';
           $cuit=$datos['cuitCliente'];
           $nroFactura=$datos['numeroFactura'];
           $nroDeComprobante=321;
           $fecha=trim(str_replace('-', '', str_replace('00','',str_replace(':','',str_replace('-','',$datos['fecha']))))); // fehca
            $linea="1";//codigo del comprobante
            $linea.=$fecha;
            $linea.=str_pad('*',2,0, STR_PAD_LEFT); // tipo de comprobante
            
            $linea.=str_pad('',1,' ', STR_PAD_LEFT).''; // importe liquidado NO INFORMADO
            
            $linea.=$this->getPuntoVenta($datos['talonarioId']).''; // talonario 4
            $linea.=$nroFactura.''; // nro Factura 20
            $linea.=$nroFactura.''; // nro Factura hasta 20
            $linea.='2'; // nro de identificacion del comprador 2
            $linea.=(($cuit=='')?'00000000000':$cuit).''; // cuit 11
            $linea.= str_pad(substr($datos['cliente'], 0,30), 30).'';  // nombre del cliente 30
            $linea.=str_pad($importeTotal,15,'0', STR_PAD_LEFT).''; // importe de la factura total 15
            $linea.=str_pad('',15,'0', STR_PAD_LEFT).''; // importe de la factura NETO 15
            $linea.=str_pad($importeNeto,15,'0', STR_PAD_LEFT).''; // importe de la factura NETO 15
             
            $linea.='2100'; // alicuota IVA 4 -->aca no se por que puede ser que se encuentren 2 alicuotas en 1 factura
            $linea.=str_pad(number_format($datos['importeFactura']-($datos['iva105']+$datos['iva21']),2,'',''),15,'0', STR_PAD_LEFT).''; // impuesto liquidado 15
            
            $linea.=str_pad('',15,' ', STR_PAD_LEFT).''; // importe liquidado NO INFORMADO
            
            $linea.=str_pad('0',15,'0', STR_PAD_LEFT).''; // impoirte liquidaciones exentas 15
            
            $linea.=str_pad('',15,' ', STR_PAD_LEFT).''; // importe liquidado NO INFORMADO
            $linea.=str_pad('',15,' ', STR_PAD_LEFT).''; // importe liquidado NO INFORMADO
            $linea.=str_pad('',15,' ', STR_PAD_LEFT).''; // importe liquidado NO INFORMADO
            $linea.=str_pad('',15,' ', STR_PAD_LEFT).''; // importe liquidado NO INFORMADO
            $linea.=str_pad('',2,' ', STR_PAD_LEFT).''; // importe liquidado NO INFORMADO
            $linea.=str_pad('',3,' ', STR_PAD_LEFT).''; // importe liquidado NO INFORMADO
            $linea.=str_pad('',10,' ', STR_PAD_LEFT).''; // importe liquidado NO INFORMADO
            
            $linea.='1'; // cantidad de alicuotas 1
            
            $linea.=str_pad('',1,' ', STR_PAD_LEFT).''; // importe liquidado NO INFORMADO
            $linea.=str_pad('',14,' ', STR_PAD_LEFT).''; // importe liquidado NO INFORMADO
            $linea.=str_pad('',8,' ', STR_PAD_LEFT).''; // importe liquidado NO INFORMADO
            $linea.=str_pad('',8,'*', STR_PAD_LEFT).''; // importe liquidado NO INFORMADO
            $linea.=str_pad('',75,'|', STR_PAD_LEFT).''; // importe liquidado NO INFORMADO
            
            $linea.=str_pad('', 8,'0', STR_PAD_LEFT); // fecha 9
            $linea.=str_pad('',15,'0', STR_PAD_LEFT); // importe retencion 15
            if(!$ultimo) $linea.=CHR(10); // salto de pagina
         
            return $linea;
            
        }
       
        
        private function getTipoDocCliente($tipoFactura,$idCliente)
        {
            $consFinal=$this->esConsumidorFinal($idCliente);
            if($consFinal){
                switch ($tipoFactura) {
                    case 'A': return 80;
                    break;
                    case 'B': return 99;
                    break;
                    default: return 96;
                        break;
                }
            }else{
                switch ($tipoFactura) {
                    case 'A': return 80;
                    break;
                    case 'B': return 80;
                    break;
                    default: return 96;
                    
                        break;
                }
            }
            
        }
	
	public function buscar()
	{
		$criteria=new CDbCriteria;
		
		$sort = new CSort;
        $sort->defaultOrder = 'idFacturaSaliente desc';

		$criteria->compare('t.idFacturaSaliente',$this->idFacturaSaliente);
		$criteria->compare('idCliente',$this->idCliente);
		$criteria->compare('t.fecha',$this->fecha,true);
		$criteria->compare('numeroFactura',$this->numeroFactura,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('tipoFactura',$this->tipoFactura,true);
		$criteria->compare('idCentroCosto',$this->idCentroCosto);
		$criteria->compare('fechaEstimadaCobro',$this->fechaEstimadaCobro,true);
		$criteria->with=array(
    'itemsFacturaSaliente');
		
		$res= new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort
		));
		return $res;
	}
	public function buscarEstado($estado)
	{
		$criteria=new CDbCriteria;
		
		$sort = new CSort;
        $sort->defaultOrder = 'idFacturaSaliente desc';

	
		$criteria->compare('estado',$estado,true);
		
		
		if(isset($_GET['nombre']) && trim($_GET['nombre'])!="")
		{		
			$criteria->compare('clientes.razonSocial',$_GET['nombre'],true);
			$criteria->compare('clientes.apellido',$_GET['nombre'],true,"OR"); // That didn't work
			$criteria->compare('clientes.nombre',$_GET['nombre'],true,"OR"); // That didn't work
//BUSCA UNICAMENTE POR APELLIDO; LA IDEA ES Q BUSQUE POR NOMBRE Y APELLIDO!!	
		}
		if(isset($_GET['numeroFactura']) && trim($_GET['numeroFactura'])!="")
		{		
			$criteria->compare('numeroFactura',$_GET['numeroFactura'],true);
		}
		
			if(isset($_GET['fecha']) && trim($_GET['fecha'])!="")
		{		
			$criteria->compare('fecha',$_GET['fecha'],true);
		}
				if(isset($_GET['tipoFactura']) && trim($_GET['tipoFactura'])!="")
		{		
			$criteria->compare('tipoFactura',$_GET['tipoFactura'],true);
		}		
		
		$criteria->select = "t.*,SUM(IF(itemsFacturaSaliente.porcentajeIva='21',
		itemsFacturaSaliente.importeItem*itemsFacturaSaliente.cantidad,0)) as iva21,
		SUM(IF(itemsFacturaSaliente.porcentajeIva='10.5',itemsFacturaSaliente.importeItem*itemsFacturaSaliente.cantidad,0)) as iva105,
		(SELECT SUM(pagos.importeDinero) 
		FROM pagosFactura LEFT JOIN pagos on pagos.idPago = pagosFactura.idPago where 
		pagosFactura.idFacturaSaliente=t.idFacturaSaliente) as pagos,
		SUM(itemsFacturaSaliente.importeItem*itemsFacturaSaliente.cantidad) as importeFactura,
		IF(clientes.tipoCliente='Empresa',clientes.razonSocial,CONCAT(clientes.apellido,', ',clientes.nombre)) as cliente";
		
	
		$criteria->join = "INNER JOIN clientes on clientes.idCliente = t.idCliente ".
		"LEFT JOIN itemsFacturaSaliente on itemsFacturaSaliente.idFacturaSaliente = t.idFacturaSaliente "
		;
		$criteria->group='itemsFacturaSaliente.idFacturaSaliente,t.idFacturaSaliente ';
		
		$res= new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort
		));
		return $res;
	}
	public function bajarFactura($id)
	{
		$factura=self::model()->findByPk($id);
		if($factura->estado=='ANULADA')
			Yii::app()->user->setFlash('error',"La factura ya esta ANULADA!");
		else{
			
			$this->bajarItemsFactura($id);
			OrdenesCobroFacturas::model()->quitarPagos($id);
			FacturasSalientesVencimiento::model()->quitarVencimientos($id);
                        $factura->estado='ANULADA';
			$factura->save();
		}
		
	}
	private function bajarPagos($idFactura)
	{
		$items= ItemsFacturaSaliente::model()->consultarItemsFactura($idFactura);
		foreach($items as $item)
			Stock::model()->incrementarStock($item->idElemento,$item->cantidad);
		
	}
	private function bajarItemsFactura($idFactura)
	{
		$items= ItemsFacturaSaliente::model()->consultarItemsFactura($idFactura);
		foreach($items as $item)
			Stock::model()->incrementarStock($item->idElemento,$item->cantidad);
		
	}
	public function consultarFacturado($tipo)
	{
		$connection=Yii::app()->getDb();
		switch ($tipo){
			case 'hoy':{
				$sql="
SELECT sum(t.importeFactura)as importe  FROM facturasSalientes_view t WHERE t.fecha=CURDATE() ";
			}break;
			case 'mes':{
				$sql="
SELECT sum(t.importeFactura) as importe  FROM facturasSalientes_view t WHERE t.fecha between CONCAT(YEAR(CURDATE()),'-',MONTH(CURDATE()),'-01') AND CONCAT(YEAR(CURDATE()),'-',MONTH(CURDATE())+1,'-01') ";
			}break;
			case 'masVendido':{
				$sql="
SELECT stock.nombre, sum(itemsFacturaSaliente.cantidad) as cantidad,stock.idStock  FROM  facturasSalientes_view t 
		
LEFT JOIN itemsFacturaSaliente on itemsFacturaSaliente.idFacturaSaliente = t.idFacturaSaliente
LEFT JOIN stock on stock.idStock = itemsFacturaSaliente.idElemento 
		WHERE t.fecha between CONCAT(YEAR(CURDATE()),'-',MONTH(CURDATE()),'- 01') AND CONCAT(YEAR(CURDATE()),'-',MONTH(CURDATE())+1,'-01') group by itemsFacturaSaliente.idElemento order by cantidad desc";
			}break;
		}
		
		$command=$connection->createCommand($sql);
            $res=$command->queryAll();
            return isset($res[0])?$res[0]:null;
	}
	public function consultarImporteVentasMes($tipo,$mes=null,$ano=null)
	{
		$connection=Yii::app()->getDb();
		if($mes== null && $ano == null){
			$mes=Date('m');
			$ano=Date('Y');
		}
		$sql="";
		switch($tipo){
			case 'todas':{
				$sql="SELECT SUM(itemsFacturaSaliente.importeItem) as importe FROM `facturasSalientes` t left join itemsFacturaSaliente on itemsFacturaSaliente.idFacturaSaliente= t.idFacturaSaliente 
left join stock on stock.idStock = itemsFacturaSaliente.idElemento where t.fecha > '$ano-$mes-01' AND t.fecha< '$ano-$mes-31'";
				break;
			}
			case 'STOCK':{
				$sql="SELECT SUM( IF(stock.tipoProducto='$tipo',itemsFacturaSaliente.importeItem,0) ) as importe FROM `facturasSalientes` t left join itemsFacturaSaliente on itemsFacturaSaliente.idFacturaSaliente= t.idFacturaSaliente 
left join stock on stock.idStock = itemsFacturaSaliente.idElemento where t.fecha > '$ano-$mes-01' AND t.fecha< '$ano-$mes-31'";
				break;
			}
			case 'SERVICIO':{
				$sql="SELECT SUM( IF(stock.tipoProducto='$tipo',itemsFacturaSaliente.importeItem,0) ) as importe FROM `facturasSalientes` t left join itemsFacturaSaliente on itemsFacturaSaliente.idFacturaSaliente= t.idFacturaSaliente 
left join stock on stock.idStock = itemsFacturaSaliente.idElemento where t.fecha > '$ano-$mes-01' AND t.fecha< '$ano-$mes-31'";
				break;
			}
		}
		if($sql=="")return false;
		
		$command=$connection->createCommand($sql);
        $res=$command->queryAll();
        if($res==null) return false;
        return $res[0];
	}
	public function consultarVencidos($dias=0,$todos=false)
	{
		$signo=($dias>0)?'>':'<';
		$connection=Yii::app()->getDb();
		if($todos)
			$sql="
SELECT COUNT(t.idFacturaVencimiento) as cantidad, SUM(t.importeFacturaSaliente) as importe FROM facturasSalientesVencimiento t WHERE t.estado='PEND' ";
else $sql="
SELECT COUNT(t.idFacturaVencimiento) as cantidad, SUM(t.importeFacturaSaliente) as importe FROM facturasSalientesVencimiento t WHERE t.estado='PEND' AND (t.fechaVencimiento $signo CURDATE() AND t.fechaVencimiento<DATE_ADD(CURDATE(),INTERVAL $dias DAY))";
        $command=$connection->createCommand($sql);
            $res=$command->queryAll();
            return $res[0];
	}
	public function search($esFacturaCredito=0,$estado='')
	{
		$criteria=new CDbCriteria;
		
		$sort = new CSort;
        $sort->defaultOrder = 'idFacturaSaliente desc';
		if(isset($_GET['cliente']))
		{
			$criteria->compare('clientes.apellido',$_GET['cliente'],true,'OR');
                        $criteria->compare('clientes.idCliente',$_GET['cliente'],false,'OR');
			$criteria->compare('clientes.razonSocial',$_GET['cliente'],true,'OR');
			$criteria->compare('clientes.nombreFantasia',$_GET['cliente'],true,'OR');
		}
		$criteria->compare('t.idFacturaSaliente',$this->idFacturaSaliente);
		$criteria->compare('idCliente',$this->idCliente);
		if($estado!='')$criteria->compare('t.estado',$estado,false);
                else $criteria->compare('t.estado',$this->estado,true);
               
		$criteria->compare('numeroFactura',$this->numeroFactura,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		
		$criteria->compare('tipoFactura',$this->tipoFactura,true);
		$criteria->compare('idCentroCosto',$this->idCentroCosto);
                $cantidadDecimales=Settings::model()->getValorSistema('DECIMALES_FACTURAS');
		$criteria->compare('fechaEstimadaCobro',$this->fechaEstimadaCobro,true);
		$criteria->select = "t.*,talonario.esElectronica," .
				"(SELECT e.estado FROM facturasSalientes_respuestaElectronica e WHERE e.idFacturaSaliente =t.idFacturaSaliente ORDER BY e.idFacturaRespuesta desc LIMIT 1) as estadoElectronica,SUM(IF(itemsFacturaSaliente.porcentajeIva='21',
							itemsFacturaSaliente.importeItem*itemsFacturaSaliente.cantidad,0)) as iva21,
							SUM(IF(itemsFacturaSaliente.porcentajeIva='10.5',
							itemsFacturaSaliente.importeItem*itemsFacturaSaliente.cantidad,0)) as iva105,
							(SELECT SUM(ordenesCobroFacturas.importeCobroFactura) 
							FROM ordenesCobroFacturas 
							where ordenesCobroFacturas.idFacturaSaliente=t.idFacturaSaliente) as pagos,
							
							(
							(
							SUM(ROUND(itemsFacturaSaliente.importeItem*(IF(itemsFacturaSaliente.porcentajeIva=0,1,(itemsFacturaSaliente.porcentajeIva/100)+1)),$cantidadDecimales)*itemsFacturaSaliente.cantidad)
							)
							
							)as importeFactura,
							
							
							
							clientes.razonSocial,
							CONCAT(clientes.razonSocial,' ',clientes.apellido,' ',clientes.nombre) as cliente";
		$criteria->join = "INNER JOIN clientes on clientes.idCliente = t.idCliente 
		LEFT JOIN itemsFacturaSaliente on itemsFacturaSaliente.idFacturaSaliente = t.idFacturaSaliente 
		 LEFT JOIN condicionesVentaItems on (t.idCondicionVenta = condicionesVentaItems.idCondicionVenta)
                 
                 LEFT JOIN talonario on talonario.idTalonario = t.talonarioId"
		;
		if($esFacturaCredito)
                    $criteria->compare('t.esFacturaCredito',$esFacturaCredito,true,'OR');
		$criteria->group='itemsFacturaSaliente.idFacturaSaliente,t.idFacturaSaliente ';
		$res= new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort
		));
		return $res;
	}
        private function ingresarFactElect($idFacturaSaliente,$res)
        {
            $fe=new FacturasSalientesRespuestaElectronica;
            $fe->idFacturaSaliente=$idFacturaSaliente;
            $fe->estado=$res['CAE']==""?"FALLO":"OK";
            $fe->cae=$res['CAE'];
            $fe->fechaVence=$res['CAEFchVto'];
            $fe->eventos=$res['Events'];
            $fe->errores=$res['Errors'];
            $fe->save();
            
            
        }
        private function getTipoDoc($tipo,$idCliente=null)
        {
            if($idCliente==99 || $idCliente==Settings::model()->getValorSistema('IDCLIENTE_CONSUMIDORFINAL'))return 99;
            return 80;
                
        }
        /*
         * 1: Factura A
2: Nota de Débito A
3: Nota de Crédito A
6: Factura B
7: Nota de Débito B
8: Nota de Crédito B
         * FEParamGetTiposCbte

         */
        public function getTipoComprobanteElectronica($idTalonario,$consumidorFinal=false,$salidaTexto=true)
        {
            $sal='06';
            $tal=Talonario::model()->findByPk($idTalonario);
            if($tal==null)return '83';
            if($tal->tipoTalonario=='Factura'&&$tal->letraTalonario=='B')if($consumidorFinal)$sal= '11';else $sal= '06';
            if($tal->tipoTalonario=='Factura'&&$tal->letraTalonario=='A')if($consumidorFinal)$sal= '11';else $sal= '01';
            if($tal->tipoTalonario=='Factura'&&$tal->letraTalonario=='C')if($consumidorFinal)$sal= '11';else $sal= '11';
            if($tal->tipoTalonario=='Nota Credito'&&$tal->letraTalonario=='B')$sal= '08';
            if($tal->tipoTalonario=='Nota Credito'&&$tal->letraTalonario=='A')$sal= '03';
            
            if($salidaTexto) return $sal;
            return $sal+0;
        }
        public function getTipoComprobante($idTalonario,$consumidorFinal=false,$salidaTexto=true)
        {
            $sal='006';
            $tal=Talonario::model()->findByPk($idTalonario);
            if($tal==null)return '006';
            if($tal->tipoTalonario=='Factura'&&$tal->letraTalonario=='B')if($consumidorFinal)$sal= '006';else $sal= '006';
            if($tal->tipoTalonario=='Factura'&&$tal->letraTalonario=='A')if($consumidorFinal)$sal= '080';else $sal= '001';
            if($tal->tipoTalonario=='Factura'&&$tal->letraTalonario=='C')if($consumidorFinal)$sal= '082';else $sal= '082';
            if($tal->tipoTalonario=='Nota Credito'&&$tal->letraTalonario=='B')$sal= '008';
            if($tal->tipoTalonario=='Nota Credito'&&$tal->letraTalonario=='A')$sal= '003';
            
            if($salidaTexto) return $sal;
            return $sal+0;
        }
        public function getPuntoVenta($idTalo)
        {
            $tal=Talonario::model()->findByPk($idTalo);
            if($tal==null) return '00001';
            return str_pad($tal->codigoPuntoVenta,5,'0', STR_PAD_LEFT);
        }
        
        
        private function getFacturaElectronica($datosFactura,$proximoNumero,$tipo,$tipoDoc=80,$concepto=1,$iva21=0,$iva105=0, $tributoImp=0,$tributoIva=0)
{
    $datosTributo=null;
    $datosIva=null;
    $datosIva2=null;
     $cuitCliente=str_replace(' ','',str_replace('-', '', $datosFactura['cuitCliente']))+0;
    if($tipo==6||$tipo==7||$tipo==8)
        if($datosFactura['idCliente']==Settings::model()->getValorSistema('IDCLIENTE_CONSUMIDORFINAL'))$cuitCliente=0;
    else $cuitCliente=str_replace(' ','',str_replace('-', '', $datosFactura['cuitCliente']))+0;
    
    if( $tributoImp>0){
        $datosTributo['Id']=99;
        $datosTributo['Desc']='Impuesto';
        $datosTributo['BaseImp']=round($tributoImp,2);
        $datosTributo['Alic']=$tributoIva;
        $datosTributo['Importe']=round($tributoImp*$tributoIva,2);
    }
    if($tipo!=11) //si es factura C no se nforma el IVA
    if($iva21>0){
        $datosIva['Id']=5;
        $datosIva['BaseImp']=round($iva21,2);
        $datosIva['Importe']=round($iva21*0.21,2);
    }
   if($tipo!=11)//si es factura C no se nforma el IVA
     if($iva105>0){
        $datosIva2['Id']=4;
        $datosIva2['BaseImp']=round($iva105,2);
        $datosIva2['Importe']=round($iva105*0.105,2);
    }
    
    $fecha=explode(' ', $datosFactura['fecha']);
    //si es FACTURA C (11) no va con IVA
    $importeIva=$tipo==11? 0:round($datosFactura['importeFactura']-($datosFactura['iva21']+$datosFactura['iva105']),2);
    $importeNeto=$tipo==11?round($datosFactura['importeFactura'],2):round($datosFactura['iva21']+$datosFactura['iva105'],Settings::model()->getValorSistema('DECIMALES_FACTURAS'));
    $res=array(
                   'Concepto' => $concepto,
                   'DocTipo' => $tipoDoc,//80 cuit
                   'DocNro' => $cuitCliente,//23111111113
                   'CbteDesde' => $proximoNumero,//*
                   'CbteHasta' => $proximoNumero,//*
                   
//                   'CbteFch' => str_replace('-','',$fecha[0]),//*
                    'CbteFch' => Date('Ymd'),
                   'ImpTotal' => round($datosFactura['importeFactura'],Settings::model()->getValorSistema('DECIMALES_FACTURAS')), //importe total
                   'ImpTotConc' => 0, //0
                   'ImpNeto' => $importeNeto, //importe neto
                   'ImpOpEx' => 0, //importe neto
                   'ImpTrib' => 0, //importe *
                   'ImpIVA' =>$importeIva , //importe *
                   'FchServDesde' => '', //importe neto *
                   'FchServHasta' => '', //importe neto *
                   'FchVtoPago' => '', //importe neto *
                   'MonId' => 'PES', //PES *
                   'MonCotiz' => 1, //1 *
                   //'Tributos'=>array('Tributo' =>$this->getTributo($datosTributo)),
                   'Iva'=>array(
                       'AlicIva'=>
                            $this->getIvaDos($datosIva2,$datosIva)
                           ),
                    
                    );
    if($datosTributo!=null) $res['Tributos']=array('Tributo' =>$this->getTributo($datosTributo));
    if($tipo==11)$res['Iva']=null;
//    $res['Iva']=$ivas;
    print_r($res);
    return $res;
}
private function getIvaDos($iva105,$iva21)
{
    $res=array();
    if($iva105!=null) $res[]=$iva105;
    if($iva21!=null) $res[]=$iva21;
    return $res;
}
private function getTributo($datos)
{
    if($datos==null) return array();
     $res=array(
                   'Id' => $datos['Id'],
                   'Desc' => $datos['Desc'],
                   'BaseImp' => $datos['BaseImp'],//80 cuit
                   'Alic' => $datos['Alic'],//80 cuit
                   'Importe' => $datos['Importe'],//23111111113
                    );
    return $res;
}
private function getIva($datosIva)
{
    if($datosIva==null) return null;
    $res= array(
                   'Id' => $datosIva['Id'],
                   'BaseImp' => $datosIva['BaseImp'],//80 cuit
                   'Importe' => $datosIva['Importe'],//23111111113
                    );
    return (object)$res;
}public function consultarProximo($idFacturaSaliente,$cuit)
        {
            $fact=FacturasSalientes::model()->findByPk($idFacturaSaliente);
            $idTalonario=$fact->talonarioId;
            $talonario=  Talonario::model()->findByPk($idTalonario);
            $ptoVenta=$talonario->idPuntoVenta;
            $numeroFact=explode('-', $fact['numeroFactura']);
            include dirname(__FILE__).'/../controllers/facturacionElectronica/FacturaElectronica.php';
            $pk=$archivo=dirname(__FILE__).'/../controllers/facturacionElectronica/privada'.$idTalonario.'.key';
            $csr=$archivo=dirname(__FILE__).'/../controllers/facturacionElectronica/certificado'.$idTalonario;
            
            $tipo=$this->getTipoComprobante($idTalonario);
            $fact=FacturasSalientes::model()->consultarUnica($idFacturaSaliente);
            
            $p=new FacturaElectronica($pk,$csr,$cuit,$ptoVenta,$tipo);
            $cantidadRegistros=1; // son la cantidad de facturas en una misma solicitud
            
          
            $tipoDoc=$this->getTipoDoc($tipo,$fact->idCliente);
            
            echo $p->nroUltimo($ptoVenta,$tipo,$cuit);
        }
        public function ingresarFacturaElectronica($idFacturaSaliente,$cuit)
        {
            $fact=FacturasSalientes::model()->findByPk($idFacturaSaliente);
            $idTalonario=$fact->talonarioId;
            $talonario=  Talonario::model()->findByPk($idTalonario);
            $ptoVenta=$talonario->codigoPuntoVenta+0;
            $numeroFact=explode('-', $fact['numeroFactura']);
            include dirname(__FILE__).'/../controllers/facturacionElectronica/FacturaElectronica.php';
            $pk=$archivo=dirname(__FILE__).'/../controllers/facturacionElectronica/privada'.$idTalonario.'.key';
            $csr=$archivo=dirname(__FILE__).'/../controllers/facturacionElectronica/certificado'.$idTalonario.'.crt';
            
            $tipo=$this->getTipoComprobanteElectronica($idTalonario);
            $fact=FacturasSalientes::model()->consultarUnica($idFacturaSaliente);
            
            $p=new FacturaElectronica($pk,$csr,$cuit,$ptoVenta,$tipo);
            $cantidadRegistros=1; // son la cantidad de facturas en una misma solicitud
            $nroSig=$p->nroUltimo($ptoVenta, $tipo,$cuit);
          
            $tipoDoc=$this->getTipoDoc($tipo,$fact['idCliente']);
            $facturaElectronica=$this->getFacturaElectronica($fact,$nroSig,$tipo,$tipoDoc,$concepto=1,$fact['iva21'],$fact['iva105'], $tributoImp=0,$tributoIva=0);
           
            $res=$p->ingresarFactura($facturaElectronica,$cantidadRegistros);
            $this->ingresarFactElect($idFacturaSaliente,$res);
            
        }
	public function setearEstadoPago($idPago,$idEstado)
	{
		
	}
	public function consultarSaldoPorCuenta($fechaInicio, $fechaFin)
	{
		$auxIni = explode("-",$fechaInicio);
		$mes=$auxIni[1];
		$ano=$auxIni[2];
		$dia=$auxIni[0];
		
		$auxIni = $ano.'-'.$mes.'-'.$dia;
//		$dias=1; //resto 1 dia
//		$auxIni= date("Y-m-d", strtotime("$fecha -$dias day"));  
		$auxFin = explode("-",$fechaFin);
		$mes=$auxFin[1];
		$ano=$auxFin[2];
		$dia=$auxFin[0];
		
		$auxFin = $ano.'-'.$mes.'-'.$dia;
		
		$connection=Yii::app()->getDb();
            $command=$connection->createCommand("SELECT ".
"IF(clientes.tipoCliente='Empresa',clientes.razonSocial,CONCAT(clientes.apellido,', ',clientes.nombre)) as cliente, 'debe' as tipo,t.fecha, GROUP_CONCAT(itemsFacturaSaliente.nombreItem,' - ') as nombreFactura, " .
"ROUND( SUM(itemsFacturaSaliente.importeItem*itemsFacturaSaliente.cantidad),2) as importeFactura" .
" FROM facturasSalientes t INNER JOIN clientes on clientes.idCliente = t.idCliente INNER JOIN itemsFacturaSaliente on itemsFacturaSaliente.idFacturaSaliente = t.idFacturaSaliente WHERE t.fecha BETWEEN '$auxIni' AND '$auxFin'" .
" GROUP BY t.idFacturaSaliente UNION (SELECT IF(clientes.tipoCliente='Empresa',clientes.razonSocial,CONCAT(clientes.apellido,', ',clientes.nombre)) as cliente,'haber' as tipo, fecha, detalle as nombreFactura, ROUND(importeDinero,2) as importeFactura FROM pagos INNER JOIN clientes on clientes.idCliente = pagos.idCliente where fecha BETWEEN '$auxIni' AND '$auxFin') ORDER BY fecha");
            
            return $command->queryAll();
	}
	public function consultarSaldoAnteriorEmpresa($fechaInicio)
	{
		$auxIni = explode("-",$fechaInicio);
		
		$auxIni = $auxIni[0].'-'.$auxIni[1].'-'.$auxIni[2];
		
		$connection=Yii::app()->getDb();
		$sql="SELECT SUM(t.importeFactura) as importe FROM facturasSalientes_view t LEFT JOIN itemsFacturaSaliente on itemsFacturaSaliente.idFacturaSaliente = t.idFacturaSaliente  WHERE t.fecha < '$auxIni' GROUP BY t.idFacturaSaliente ";
		$command=$connection->createCommand($sql);
		$debe= $command->queryAll();
		$sql="(SELECT SUM(ordenesCobroFacturas.importeCobroFactura) as importe FROM ordenesCobro LEFT JOIN clientes on clientes.idCliente = ordenesCobro.idCliente LEFT JOIN ordenesCobroFacturas on ordenesCobroFacturas.idOrdenCobro = ordenesCobro.idOrdenCobro where fechaOrdenCobro < '$auxIni' )";
		$command=$connection->createCommand($sql);
		$haber= $command->queryAll();
            $importeDebe=0;
			$importeHaber=0;
			if(isset($debe[0]))
				$importeDebe=$debe[0]['importe'];
			if(isset($haber[0]))
				$importeHaber=$haber[0]['importe'];
				
			return $importeDebe-$importeHaber;
	}
	public function consultarSaldoEmpresa($fechaInicio,$fechaFin)
	{
		$auxIni = explode("-",$fechaInicio);
		$auxFin = explode("-",$fechaFin);
		
		$auxIni = $auxIni[0].'-'.$auxIni[1].'-'.$auxIni[2];
		$auxFin = $auxFin[0].'-'.$auxFin[1].'-'.$auxFin[2];
		
		$connection=Yii::app()->getDb();
		$sql="SELECT 
'debe' as tipo,t.fecha, GROUP_CONCAT(itemsFacturaSaliente.nombreItem) as nombreFactura, t.cliente as cliente,
t.importeFactura FROM facturasSalientes_view t LEFT JOIN itemsFacturaSaliente on itemsFacturaSaliente.idFacturaSaliente = t.idFacturaSaliente  WHERE t.estado<>'ANULADA' AND t.fecha BETWEEN '$auxIni' AND '$auxFin' GROUP BY t.idFacturaSaliente UNION all " .
		"(SELECT 'haber' as tipo, fechaOrdenCobro as fecha, 'Pago' as nombreFactura,CONCAT(clientes.apellido,' ',clientes.nombre,' ',clientes.razonSocial) as cliente, ROUND(ordenesCobroFacturas.importeCobroFactura,2) as importeFactura FROM ordenesCobro LEFT JOIN clientes on clientes.idCliente = ordenesCobro.idCliente LEFT JOIN ordenesCobroFacturas on ordenesCobroFacturas.idOrdenCobro = ordenesCobro.idOrdenCobro where fechaOrdenCobro BETWEEN '$auxIni' AND '$auxFin') ORDER BY fecha";
		
            $command=$connection->createCommand($sql);
            
            return $command->queryAll();
	}
	public function consultarSaldoAnteriorCliente($auxIni,$idCliente)
	{
            if($auxIni=="")
                $debe=null; else{
		$connection=Yii::app()->getDb();
            		$sql="SELECT SUM(importeFactura) as importe FROM facturasSalientes_view t   WHERE t.estado<>'ANULADA' AND t.fecha < '$auxIni' AND t.idCliente = $idCliente " ;
            				
            		$command=$connection->createCommand($sql);
            $debe= $command->queryAll();
                }
                 if($auxIni=="")
                     $haber=null; else{
           $sql= "(SELECT SUM(ordenesCobroFacturas.importeCobroFactura) as importe FROM ordenesCobro LEFT JOIN ordenesCobroFacturas on ordenesCobroFacturas.idOrdenCobro = ordenesCobro.idOrdenCobro where fechaOrdenCobro < '$auxIni'AND idCliente = '$idCliente')";
            $command=$connection->createCommand($sql);
            $haber= $command->queryAll();
                     }
			$importeDebe=0;
			$importeHaber=0;
			if(isset($debe[0]))
				$importeDebe=$debe[0]['importe'];
			if(isset($haber[0]))
				$importeHaber=$haber[0]['importe'];
				
			return $importeDebe-$importeHaber;
	}
	public function consultarSaldoCliente($auxIni,$auxFin,$idCliente)
	{
		$connection=Yii::app()->getDb();
                if($auxIni==""){
                    $sql="SELECT 
'debe' as tipo,t.fecha, GROUP_CONCAT(itemsFacturaSaliente.nombreItem) as nombreFactura, 
t.importeFactura FROM facturasSalientes_view t LEFT JOIN itemsFacturaSaliente on itemsFacturaSaliente.idFacturaSaliente = t.idFacturaSaliente  WHERE t.estado='PEND' AND t.estado<>'ANULADA' AND t.idCliente = $idCliente GROUP BY t.idFacturaSaliente UNION all" .
		"(SELECT 'haber' as tipo, fechaOrdenCobro as fecha, 'Pago' as nombreFactura, ROUND(SUM(ordenesCobroFacturas.importeCobroFactura),2) as importeFactura FROM ordenesCobro LEFT JOIN ordenesCobroFacturas on ordenesCobroFacturas.idOrdenCobro = ordenesCobro.idOrdenCobro where importeAcuenta<>0 GROUP BY ordenesCobro.idOrdenCobro) ORDER BY fecha";
                
                }else{
            		$sql="SELECT 
'debe' as tipo,t.fecha, GROUP_CONCAT(itemsFacturaSaliente.nombreItem) as nombreFactura, 
t.importeFactura FROM facturasSalientes_view t LEFT JOIN itemsFacturaSaliente on itemsFacturaSaliente.idFacturaSaliente = t.idFacturaSaliente  WHERE t.estado='PEND' AND t.fecha BETWEEN '$auxIni' AND '$auxFin' AND t.idCliente = $idCliente GROUP BY t.idFacturaSaliente UNION all" .
		"(SELECT 'haber' as tipo, fechaOrdenCobro as fecha, 'Pago' as nombreFactura, ROUND(SUM(ordenesCobroFacturas.importeCobroFactura),2) as importeFactura FROM ordenesCobro LEFT JOIN ordenesCobroFacturas on ordenesCobroFacturas.idOrdenCobro = ordenesCobro.idOrdenCobro where fechaOrdenCobro BETWEEN '$auxIni' AND '$auxFin' AND idCliente = '$idCliente' GROUP BY ordenesCobro.idOrdenCobro) ORDER BY fecha";
                }
            $command=$connection->createCommand($sql);
            return $command->queryAll();

	}
}