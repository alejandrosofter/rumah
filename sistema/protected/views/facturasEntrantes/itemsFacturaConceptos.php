<?php $total=0 ;$subTotal=0?>
<table>
<tr>
 <th><?php echo FacturasEntrantesConcepto::model()->getAttributeLabel('idConcepto')?></th>
    <th><?php echo FacturasEntrantesConcepto::model()->getAttributeLabel('alicuotaIva')?></th>
    <th><?php echo FacturasEntrantesConcepto::model()->getAttributeLabel('importe')?></th>

    <th><?php echo CHtml::link('Agregar', '#', array('submit'=>'', 'params'=>array('FacturasEntrantesConcepto[command]'=>'add', 'noValidate'=>true)));?></th>
</tr>
<?php foreach($manager->items as $id=>$item):?>
<?php  $this->renderPartial('/facturasEntrantesConcepto/_form', array('id'=>$id, 'model'=>$item, 'form'=>$form));?>
<?php 
$total+=$item->importe*(($item->alicuotaIva/100)+1);
$subTotal+=$item->importe;
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
