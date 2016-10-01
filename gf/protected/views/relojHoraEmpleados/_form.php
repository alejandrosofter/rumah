<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reloj-hora-empleados-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idEmpleado'); ?>
		<?php echo $form->textField($model,'idEmpleado',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'idEmpleado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'justificado'); ?>
		<?php echo $form->textField($model,'justificado',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'justificado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estadoHora'); ?>
		<?php echo $form->textField($model,'estadoHora',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'estadoHora'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaHoraTrabajo'); ?>
		<?php echo $form->textField($model,'fechaHoraTrabajo'); ?>
		<?php echo $form->error($model,'fechaHoraTrabajo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entradaSalida'); ?>
		<?php echo $form->textField($model,'entradaSalida',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'entradaSalida'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comentarioHora'); ?>
		<?php echo $form->textField($model,'comentarioHora',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'comentarioHora'); ?>
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->