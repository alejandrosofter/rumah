<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sesiones-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idUsuario'); ?>
		<?php echo $form->textField($model,'idUsuario'); ?>
		<?php echo $form->error($model,'idUsuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaIngresa'); ?>
		<?php echo $form->textField($model,'fechaIngresa'); ?>
		<?php echo $form->error($model,'fechaIngresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaEgresa'); ?>
		<?php echo $form->textField($model,'fechaEgresa'); ?>
		<?php echo $form->error($model,'fechaEgresa'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->