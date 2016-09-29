<?php 

class AvisoFinanzasCobrosCommand extends CConsoleCommand
{
    public function run($args)
    {
       $sql="SELECT fs.*, t.*,datediff(NOW(), t.fechaVencimiento) as diasVencidos FROM `facturasSalientesVencimiento` t 
INNER JOIN facturasSalientes_view fs on fs.idFacturaSaliente=t.idFacturaSaliente
WHERE datediff(NOW(), t.fechaVencimiento) >0 AND t.estado='PEND'";
       $connection=Yii::app()->getDb();
        $command=$connection->createCommand($sql);
         $res= $command->queryAll();
         $tabla='<table>';
          $tabla.='<tr>';
          $tabla.='<th>Fecha </th>';
          $tabla.='<th>Cliente </th>';
          $tabla.='<th>Nro Fact. </th>';
          $tabla.='<th>Días Vencidos </th>';
          $tabla.='<th>Importe </th>';
          $tabla.='</tr>';
         foreach ($res as $factura){
             $cliente=Clientes::model()->findByPk($factura['idCliente']);
             $nombreCliente=$cliente['apellido'].' '.$cliente['nombre'].' '.$cliente['razonSocial'];
             
             $tabla.='<tr>';
          $tabla.='<td>'.Yii::app()->dateFormatter->format("dd-M-y",$factura['fecha']).' </td>';
          $tabla.='<td>'.$nombreCliente.' </td>';
          $tabla.='<td>'.$factura['tipoFactura'].$factura['numeroFactura'].'</td>';
          $tabla.='<td>'.$factura['diasVencidos'].' </td>';
          $tabla.='<td>'.Yii::app()->numberFormatter->formatCurrency($factura['importeFactura'],"$").' </td>';
          $tabla.='</tr>';

         }
         $tabla.='</table>';
         $parametros['contacto']=$cliente->nombresContactoFinanzas;
         $parametros['contenido']=$tabla;
         $parametros['fechaActual']=Yii::app()->dateFormatter->format("dd-M-y",Date('Y-m-d'));
         if(Settings::model()->getValorSistema('GENERALES_MAIL_REMITENTE_FINANZAS')!='')
      				Mensajes::model()->enviarMail(Settings::model()->getValorSistema('GENERALES_MAIL_REMITENTE_FINANZAS'),Settings::model()->getValorSistema('GENERALES_MAIL_IMPRESION_COBROSGRAL',$parametros,'impresiones'),'Cobros PENDIENTES DE PAGO al '.$parametros['fechaActual'],Settings::model()->getValorSistema('GENERALES_MAIL_REMITENTE_FINANZAS'));
      			
    }
}