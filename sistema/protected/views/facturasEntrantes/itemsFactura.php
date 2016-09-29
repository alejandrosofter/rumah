<?php $total=0 ;$subTotal=0?>
<table id='itemsFactura'>
<tr>
 <th><?php echo ComprasItems::model()->getAttributeLabel('cantidad')?></th>
    <th><?php echo ComprasItems::model()->getAttributeLabel('idStock')?></th>
    <th><?php echo ComprasItems::model()->getAttributeLabel('alicuotaIva')?></th>
    <th><?php echo ComprasItems::model()->getAttributeLabel('importeCompra')?></th>
    <th><?php echo CHtml::link('Agregar', '#', array('submit'=>'', 'params'=>array('ComprasItems[command]'=>'add', 'noValidate'=>true)));?></th>
</tr>

<?php foreach($manager->items as $id=>$item):?>

<?php  $this->renderPartial('/comprasItems/_form', array('id'=>$id, 'model'=>$item, 'form'=>$form));?>

<?php 
if(strtoupper($model->tipoFactura)=='A'){
	$total+=$item->importeCompra*$item->cantidad*(($item->alicuotaIva/100)+1);
	$subTotal+=$item->importeCompra*$item->cantidad;
}else{
	$total+=$item->importeCompra*$item->cantidad;
	$subTotal+=$item->importeCompra*$item->cantidad;
}

 ?>

<?php endforeach;?>
<?php 
	$total+=($model->importeFlete*1.21)-$model->importeDescuentos+$model->importeRecargos+$model->importeImpuestos;
	$subTotal+=$model->importeFlete-$model->importeDescuentos+$model->importeRecargos+$model->importeImpuestos;


 ?>
<br>
</table>
<div id="izquierda">
<table>
	<tr>
		<td><b>Flete</b></td>
		<td><?php echo $form->textField($model,'importeFlete',array('class'=>'span2','maxlength'=>30,'TYPE'=>'hidden2')); ?></td>
	</tr>
	<tr>
		<td><b>Descuentos</b></td>
		<td><?php echo $form->textField($model,'importeDescuentos',array('class'=>'span2','maxlength'=>30,'TYPE'=>'hidden2')); ?></td>
	</tr>
	<tr>
		<td><b>No grabado</b></td>
		<td><?php echo $form->textField($model,'importeRecargos',array('class'=>'span2','maxlength'=>30,'TYPE'=>'hidden2')); ?></td>
	</tr>
	<tr>
		<td><b>Impuestos</b></td>
		<td><?php echo $form->textField($model,'importeImpuestos',array('class'=>'span2','maxlength'=>30,'TYPE'=>'hidden2')); ?></td>
	</tr>
	
</table>
</div>
<div id="derecha">
<h5>SUB-TOTAL <?php echo Yii::app()->numberFormatter->formatCurrency($subTotal,"$");?></h5>
<h3>TOTAL <?php echo Yii::app()->numberFormatter->formatCurrency($total,"$")?></h3>

</div>