<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comentarios-ficha-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idTipo'); ?>
		<?php echo $form->textField($model,'idTipo'); ?>
		<?php echo $form->error($model,'idTipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaComentario'); ?>
		<?php echo $form->textField($model,'fechaComentario'); ?>
		<?php echo $form->error($model,'fechaComentario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'detalleComentario'); ?>
		<?php echo $form->textArea($model,'detalleComentario',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'detalleComentario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idUsuario'); ?>
		<?php echo $form->textField($model,'idUsuario'); ?>
		<?php echo $form->error($model,'idUsuario'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->