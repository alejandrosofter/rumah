<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'componentes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idStock'); ?>
		<?php echo $form->textField($model,'idStock'); ?>
		<?php echo $form->error($model,'idStock'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->