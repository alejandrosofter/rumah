<?php 

class CobrosCommand extends CConsoleCommand
{
    public function run($args)
    {
       $sql="SELECT fs.*, t.*,datediff(NOW(), t.fechaVencimiento) as diasVencidos FROM `facturasSalientesVencimiento` t 
INNER JOIN facturasSalientes_view fs on fs.idFacturaSaliente=t.idFacturaSaliente
WHERE datediff(NOW(), t.fechaVencimiento) >0 AND t.estado='PEND'";
       $connection=Yii::app()->getDb();
        $command=$connection->createCommand($sql);
         $res= $command->queryAll();
         foreach ($res as $factura){
             $cliente=Clientes::model()->findByPk($factura['idCliente']);
             $nombreCliente=$cliente['apellido'].' '.$cliente['nombre'].' '.$cliente['razonSocial'];
             
             $parametros['titulo']="Factura nro ".$factura['numeroFactura']." PENDIENTE de pago";
      			$parametros['numeroFactura']=$factura['numeroFactura'];
                        $parametros['tipoFactura']=$factura['tipoFactura'];
                        $parametros['fecha']=Yii::app()->dateFormatter->format("dd-M-y",$factura['fecha']);
                        $parametros['importeFactura']=Yii::app()->numberFormatter->formatCurrency($factura['importeFactura'],"$");
                        $parametros['fechaVencimiento']=$factura['fechaVencimiento'];
                        $parametros['diasVencidos']=$factura['diasVencidos'];
                        $parametros['contacto']=$cliente->nombresContactoFinanzas;
                        
      			if($cliente->emailContactoFinanzas!='')
      				Mensajes::model()->enviarMail($cliente->emailContactoFinanzas,Settings::model()->getValorSistema('GENERALES_MAIL_IMPRESION_COBROPENDIENTE',$parametros,'impresiones'),$parametros['titulo'],Settings::model()->getValorSistema('GENERALES_MAIL_REMITENTE_FINANZAS'));
      			if(isset($args[0]) && $args[0]=='tel' && $cliente->mobilContactoFinanzas!='')
      				Mensajes::model()->enviarMensaje($parametros['titulo'], $parametros['mensaje'], $user->mobil);
      			
            
         }
    }
}