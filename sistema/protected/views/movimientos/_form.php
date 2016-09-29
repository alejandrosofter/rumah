<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'movimientos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idMovimiento'); ?>
		<?php echo $form->textField($model,'idMovimiento'); ?>
		<?php echo $form->error($model,'idMovimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idUsuario'); ?>
		<?php echo $form->textField($model,'idUsuario'); ?>
		<?php echo $form->error($model,'idUsuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipoMovimiento'); ?>
		<?php echo $form->textField($model,'tipoMovimiento',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'tipoMovimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tabla'); ?>
		<?php echo $form->textField($model,'tabla',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'tabla'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idElemento'); ?>
		<?php echo $form->textField($model,'idElemento'); ?>
		<?php echo $form->error($model,'idElemento'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->