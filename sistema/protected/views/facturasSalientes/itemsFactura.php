<?php $total=0 ;$subTotal=0?>
<?php $this->renderPartial('/varios/busquedaPorCodigo', array('model'=>$model,'form'=>$form),false);?>

<table id="hor-minimalist-b">
<tr>
 <th scope="col"><?php echo ItemsFacturaSaliente::model()->getAttributeLabel('Stock')?></th>
    <th scope="col"><?php echo ItemsFacturaSaliente::model()->getAttributeLabel('Cant')?></th>
    <th scope="col">% IVA</th>
<!--     <th scope="col">//-->
           
<!--         <br>Importe</th>-->
<!--    <th scope="col"></th>-->
    <th scope="col">$ NETO</th>
    <th scope="col">$ FINAL</th>
    <th scope="col"></th>
</tr>

<?php
$boni=0;
$hacer=false;
$total21=0;
$subTotal21=0;
$total105=0;
$subTotal105=0;
$total=0;
$subTotal=0;

if($condicionVenta==0)$hacer=true;
//$manager->items=array_reverse($manager->items);
foreach($manager->items as $id=>$item):?>
<?php 

$this->renderPartial('/itemsFacturaSaliente/_form', array('id'=>$id, 'model'=>$item, 'form'=>$form));

?>
<?php 
if(strtoupper($item->porcentajeIva)=='21'){
	$total21+=$item->importeItem*($item->porcentajeIva/100)*$item->cantidad;
	$subTotal21+=($item->importeItem * 21)/100*$item->cantidad;
}

if(strtoupper($item->porcentajeIva)=='10.5'){
	$total105+=$item->importeItem*($item->porcentajeIva/100)*$item->cantidad;
	$subTotal105+=($item->importeItem * 10.5)/100*$item->cantidad;
}
$iva=$item->porcentajeIva==0?1:(($item->porcentajeIva/100)+1);
$total+=round($item->importeItem*$iva,Settings::model()->getValorSistema('DECIMALES_FACTURAS'))*$item->cantidad;
$subTotal+=$item->importeItem*$item->cantidad;
	$boni+=$item->bonificado;
 ?>
<?php endforeach;

$total+=$interes-$bonificacion;
$total21+=($interes/1.21)-($bonificacion/1.21);
$subTotal+=($interes/1.21)-($bonificacion/1.21);
?>

<br>
</table>


<?php
$cadenaTotales="<div><h3>TOTALES </h3>";
$cadenaTotales.="<h7>IVA 10.5 <b>".Yii::app()->numberFormatter->formatCurrency($total105,"$")."</b></h7><br>";
$cadenaTotales.="<h7>IVA 21 <b>".Yii::app()->numberFormatter->formatCurrency($total21,"$")."</b></h7>";
$cadenaTotales.="<h5>SUB-TOTAL ".Yii::app()->numberFormatter->formatCurrency($subTotal,"$")."</h5>";
$cadenaTotales.="<h4><font color='blue'>TOTAL ".Yii::app()->numberFormatter->formatCurrency(round($total,Settings::model()->getValorSistema('DECIMALES_FACTURAS')),"$")."</font></h4>";
if($interes>0) $cadenaTotales.="<h5><font color='red'>INTERES ".Yii::app()->numberFormatter->formatCurrency($interes,"$")."</font></h5>";
if($bonificacion>0) $cadenaTotales.="<h5><font color='green'>BONIF. ".Yii::app()->numberFormatter->formatCurrency($bonificacion,"$")."</font></h5>";
//$color=$tipo_=="INTERES"?"red":"green";
$cadenaTotales.="</div>";
//if(!$hacer)$cadenaTotales.="<h7><font color='".$color."'>$tipo_ <b>".Yii::app()->numberFormatter->formatCurrency($interes,"$")."</b></font></h7>";

$this->extra=$cadenaTotales;
?>
