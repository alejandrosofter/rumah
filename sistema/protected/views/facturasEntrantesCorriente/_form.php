<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'facturas-entrantes-corriente-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idFacturaEntrante'); ?>
		<?php echo $form->textField($model,'idFacturaEntrante'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaDesde'); ?>
		<?php echo $form->textField($model,'fechaDesde'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaHasta'); ?>
		<?php echo $form->textField($model,'fechaHasta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estadoFactura'); ?>
		<?php echo $form->textField($model,'estadoFactura',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comentario'); ?>
		<?php echo $form->textArea($model,'comentario',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->