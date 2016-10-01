<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuarios-paneles-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombrePanel'); ?>
		<?php echo $form->textField($model,'nombrePanel',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombrePanel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcionPanel'); ?>
		<?php echo $form->textArea($model,'descripcionPanel',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcionPanel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ayuda'); ?>
		<?php echo $form->textArea($model,'ayuda',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ayuda'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'linkAyuda'); ?>
		<?php echo $form->textField($model,'linkAyuda',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'linkAyuda'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->