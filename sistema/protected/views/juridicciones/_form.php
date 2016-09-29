<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'juridicciones-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombreJuridiccion'); ?>
		<?php echo $form->textField($model,'nombreJuridiccion',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombreJuridiccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigoJuridiccion'); ?>
		<?php echo $form->textField($model,'codigoJuridiccion',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'codigoJuridiccion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->