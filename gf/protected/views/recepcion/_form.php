<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'recepcion-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idCliente'); ?>
		<?php echo $form->textField($model,'idCliente'); ?>
		<?php echo $form->error($model,'idCliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcionRecepcion'); ?>
		<?php echo $form->textArea($model,'descripcionRecepcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcionRecepcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaRecepcion'); ?>
		<?php echo $form->textField($model,'fechaRecepcion'); ?>
		<?php echo $form->error($model,'fechaRecepcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipoRecepcion'); ?>
		<?php echo $form->textField($model,'tipoRecepcion',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'tipoRecepcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idRecepcionPadre'); ?>
		<?php echo $form->textField($model,'idRecepcionPadre'); ?>
		<?php echo $form->error($model,'idRecepcionPadre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estadoRecepcion'); ?>
		<?php echo $form->textField($model,'estadoRecepcion',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'estadoRecepcion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->