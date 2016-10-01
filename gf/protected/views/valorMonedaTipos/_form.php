<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'valor-moneda-tipos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombreMoneda'); ?>
		<?php echo $form->textField($model,'nombreMoneda',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombreMoneda'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->