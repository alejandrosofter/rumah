<?php $total=0 ;$subTotal=0?>
<table id="itemsVenta">
<tr>
 <th>Producto</th>
    <th>Cantidad</th>
    <th>% IVA</th>
     <th>Lista Precio<br>Importe</th>
    <th>Bonif.</th>
    <th>Importe</th>
</tr>

<?php 
$boni=0;

$total21=0;
$subTotal21=0;
$total105=0;
$subTotal105=0;
foreach($manager->items as $id=>$item):?>
<?php  $this->renderPartial('/varios/FormVenta', array('id'=>$id, 'model'=>$item,'idTabla'=>'idPresupuesto','idKey'=>'idPresupuesto', 'form'=>$form));?>
<?php 
//if(strtoupper($item->porcentajeIva)=='21'){
//	$total21+=$item->importeItem*$item->cantidad;
//	$subTotal21+=($item->importeItem * 21)/100*$item->cantidad;
//}
//
//if(strtoupper($item->porcentajeIva)=='10.5'){
//	$total105+=$item->importeItem*$item->cantidad;
//	$subTotal105+=($item->importeItem * 10.5)/100*$item->cantidad;
//}
//
//
//	$boni+=$item->bonificado;
 ?>
<?php endforeach;?>
<?php 
//	$total+=($model->importeFlete*1.21)-$model->importeDescuentos+$model->importeRecargos+$model->importeImpuestos;
//	$subTotal+=$model->importeFlete-$model->importeDescuentos+$model->importeRecargos+$model->importeImpuestos;


 ?>
<br>
</table>
<div id="derecha">

<?php echo CHtml::link('Agregar', '#', array('submit'=>'', 'class'=>'btn small success',
'params'=>array('ItemsFacturaSaliente[command]'=>'add', 'noValidate'=>true)));?>

</div>
<br>
<br>

<div id="izquierda">
<h5>IVA 10.5</h5>
<h7>SUB-TOTAL <?php 
echo Yii::app()->numberFormatter->formatCurrency($subTotal105,"$");
?></h7>
<br>
<h7>TOTAL <?php 
echo Yii::app()->numberFormatter->formatCurrency($total105,"$");
?></h7>



<h5>IVA 21</h5>
<h7>SUB-TOTAL <?php 
echo Yii::app()->numberFormatter->formatCurrency($subTotal21,"$");
?></h7>
<br>
<h7>TOTAL <?php 
echo Yii::app()->numberFormatter->formatCurrency($total21,"$");
?></h7>


</div>


<div id="derecha">
<h4>BONIFICADO <?php 
echo Yii::app()->numberFormatter->formatCurrency($boni,"$");
?></h4>

<h4>INTERES <?php echo $condicionVenta."% ";
echo Yii::app()->numberFormatter->formatCurrency(($total105+$total21)*$condicionVenta/100," $");
?></h4>

<h5>SUB-TOTAL <?php 
echo Yii::app()->numberFormatter->formatCurrency($subTotal105+$subTotal21,"$");
?></h5>
<h2>TOTAL <?php 
echo Yii::app()->numberFormatter->formatCurrency($total105+$total21+($total105+$total21)*$condicionVenta/100,"$");
?></h2>


</div>