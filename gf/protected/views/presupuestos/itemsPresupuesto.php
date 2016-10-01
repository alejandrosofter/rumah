<?php $total=0 ;$subTotal=0?>
<table id="itemsVenta">
<tr>
 <th><?php echo PresupuestoItems::model()->getAttributeLabel('Stock')?></th>
    <th><?php echo PresupuestoItems::model()->getAttributeLabel('Cant')?></th>
    <th>% IVA</th>
     <th><?php echo PresupuestoItems::model()->getAttributeLabel('tipo')?><br>Importe</th>
    <th><?php echo PresupuestoItems::model()->getAttributeLabel('bonif')?></th>
    <th><?php echo PresupuestoItems::model()->getAttributeLabel('importe')?></th>
</tr>

<?php 
$boni=0;

$total21=0;
$subTotal21=0;
$total105=0;
$subTotal105=0;
foreach($manager->items as $id=>$item):?>
<?php  $this->renderPartial('/presupuestoItems/_form', array('id'=>$id, 'model'=>$item, 'form'=>$form));?>
<?php 
if(strtoupper($item->porcentajeIva)=='21'){
	$total21+=$item->importeItem*$item->cantidadItems;
	$subTotal21+=($item->importeItem * 21)/100*$item->cantidadItems;
}

if(strtoupper($item->porcentajeIva)=='10.5'){
	$total105+=$item->importeItem*$item->cantidadItems;
	$subTotal105+=($item->importeItem * 10.5)/100*$item->cantidadItems;
}


	$boni+=$item->bonificado;
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
'params'=>array('PresupuestoItems[command]'=>'add', 'noValidate'=>false)));?>

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