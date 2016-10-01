<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'estados-recepcion-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idRecepcion'); ?>
		<?php echo $form->textField($model,'idRecepcion'); ?>
		<?php echo $form->error($model,'idRecepcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaEstadoRecepcion'); ?>
		<?php echo $form->textField($model,'fechaEstadoRecepcion'); ?>
		<?php echo $form->error($model,'fechaEstadoRecepcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcionEstadoRecepcion'); ?>
		<?php echo $form->textArea($model,'descripcionEstadoRecepcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcionEstadoRecepcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idUsuarioEstado'); ?>
		<?php echo $form->textField($model,'idUsuarioEstado'); ?>
		<?php echo $form->error($model,'idUsuarioEstado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estadoEstadoRecepcion'); ?>
		<?php echo $form->textField($model,'estadoEstadoRecepcion',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'estadoEstadoRecepcion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->