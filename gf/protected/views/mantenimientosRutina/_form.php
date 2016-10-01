<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mantenimientos-rutina-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idMantenimientoEmpresa'); ?>
		<?php echo $form->textField($model,'idMantenimientoEmpresa'); ?>
		<?php echo $form->error($model,'idMantenimientoEmpresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idRutina'); ?>
		<?php echo $form->textField($model,'idRutina'); ?>
		<?php echo $form->error($model,'idRutina'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comentario'); ?>
		<?php echo $form->textField($model,'comentario'); ?>
		<?php echo $form->error($model,'comentario'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->