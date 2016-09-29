<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ordenes-cobro-facturas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	

	<div class="row">
		<?php echo $form->labelEx($model,'idOrdenCobro'); ?>
		<?php echo $form->textField($model,'idOrdenCobro'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idFacturaSaliente'); ?>
		<?php echo $form->textField($model,'idFacturaSaliente'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idFacturaVencimiento'); ?>
		<?php echo $form->textField($model,'idFacturaVencimiento'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'importeCobroFactura'); ?>
		<?php echo $form->textField($model,'importeCobroFactura'); ?>
		
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->