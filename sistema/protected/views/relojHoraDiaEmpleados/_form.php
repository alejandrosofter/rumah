<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reloj-hora-dia-empleados-form',
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
		<?php echo $form->labelEx($model,'fechaDia'); ?>
		<?php echo $form->textField($model,'fechaDia'); ?>
		<?php echo $form->error($model,'fechaDia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estadoFecha'); ?>
		<?php echo $form->textField($model,'estadoFecha',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'estadoFecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comentario'); ?>
		<?php echo $form->textField($model,'comentario',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'comentario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entradaUno'); ?>
		<?php echo $form->textField($model,'entradaUno',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'entradaUno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'salidaUno'); ?>
		<?php echo $form->textField($model,'salidaUno',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'salidaUno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entradaDos'); ?>
		<?php echo $form->textField($model,'entradaDos',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'entradaDos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'salidaDos'); ?>
		<?php echo $form->textField($model,'salidaDos',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'salidaDos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entradaTres'); ?>
		<?php echo $form->textField($model,'entradaTres',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'entradaTres'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'salidaTres'); ?>
		<?php echo $form->textField($model,'salidaTres',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'salidaTres'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modificacion'); ?>
		<?php echo $form->textField($model,'modificacion',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'modificacion'); ?>
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->