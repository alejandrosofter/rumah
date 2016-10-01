<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reloj-tipo-turnos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombreTurno'); ?>
		<?php echo $form->textField($model,'nombreTurno',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombreTurno'); ?>
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->