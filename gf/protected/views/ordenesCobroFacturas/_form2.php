<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ordenes-pago-vencimientos-form',
	'action'=>Yii::app()->createUrl('ordenesCobroFacturas/create'),
	'method'=>'post',
	'focus'=>('#idFacturaSaliente_'),
	'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->textField($model,'idOrdenCobro',array('TYPE'=>'hidden')
); ?>

<?php echo $form->textField($model,'idFacturaSaliente',array('TYPE'=>'hidden')
); ?>

<?php echo $form->textField($model,'idFacturaVencimiento',array('TYPE'=>'hidden')
); ?>
<?php echo $form->textField($model,'pagado',array('TYPE'=>'hidden')
); ?>

<table>
<td>
	<div class="row">
		<?php  echo $form->labelEx($model,'facturaSaliente');  ?>
		<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(

    'name'=>'idFacturaSaliente_',
    'sourceUrl'=>$this->createUrl('facturasSalientesVencimiento/etiquetasPendientes&idCliente='.$idCliente),
//									facturasEntrates
    'options'=>array('width'=>250,
    'showAnim'=>'fold',

  'select'=>"js:function(event, ui) {
     $('#OrdenesCobroFacturas_idFacturaSaliente').val(ui.item.idFacturaSaliente);" .
//		ordenespagoVencimiento_idfacturaentrante
     "$( '#idFacturaSalienteVencimiento_' ).autocomplete( 'option', 'source', "
//     		idfacturaentrantevencimiento
    ." 'index.php?r=facturasSalientesVencimiento/etiquetasPendientesVencimientos&idFacturaSaliente='+ui.item.idFacturaSaliente);".
//    				facturasEntrantesVenciminetos/etiquetasPendientes&idFacturasEntrantes
    "return false;
  }",
),
'htmlOptions'=>array('rows'=>5,'size'=>20),

));
?>
		<?php echo $form->error($model,'idFacturaSaliente'); ?>
	</div>
</td>
<td>
	<div class="row">
		<?php echo $form->labelEx($model,'facturaVencimiento');  ?>
		<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(

    'name'=>'idFacturaSalienteVencimiento_',
    'sourceUrl'=>$this->createUrl('facturasSalientesVencimiento/etiquetasPendientesVencimientos&idFacturaSaliente='.$model->idFacturaSaliente),
    'options'=>array('width'=>250,
    'showAnim'=>'fold',

  'select'=>"js:function(event, ui) {
     $('#OrdenesCobroFacturas_idFacturaVencimiento').val(ui.item.idFacturaVencimiento);" .
     "$('#OrdenesCobroFacturas_importeCobroFactura').val(ui.item.paraPagar);".
     "$('#OrdenesCobroFacturas_pagado').val(ui.item.pagado);".
    "return false;
  }",
),
'htmlOptions'=>array('rows'=>5,'size'=>20),

));
?>
		<?php echo $form->error($model,'idFacturaVencimiento'); ?>
	</div>
</td>
<td>
	<div class="row">
		<?php echo $form->labelEx($model,'importeCobroFactura'); ?>
		<?php echo $form->textField($model,'importeCobroFactura',array('placeholder'=>'0.00')); ?>
		<?php echo $form->error($model,'importeCobroFactura'); ?>
	</div>
</td>
<td>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Agregar'); ?>
	</div>
</td>
</table>
<?php $this->endWidget(); ?>

</div><!-- form -->