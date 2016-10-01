<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reloj-turnos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idTipoTurno'); ?>
		<?php echo $form->textField($model,'idTipoTurno',array('class'=>'span2','maxlength'=>255)); ?>
		<?php echo $form->error($model,'idTipoTurno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ingresoInicio'); ?>
		<?php echo $form->textField($model,'ingresoInicio',array('class'=>'span1','maxlength'=>255)); ?>
		<?php echo $form->error($model,'ingresoInicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'salidaInicio'); ?>
		<?php echo $form->textField($model,'salidaInicio',array('class'=>'span1','maxlength'=>255)); ?>
		<?php echo $form->error($model,'salidaInicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ingresoRegreso'); ?>
		<?php echo $form->textField($model,'ingresoRegreso',array('class'=>'span1','maxlength'=>255)); ?>
		<?php echo $form->error($model,'ingresoRegreso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'salidaRegreso'); ?>
		<?php echo $form->textField($model,'salidaRegreso',array('class'=>'span1','maxlength'=>255)); ?>
		<?php echo $form->error($model,'salidaRegreso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'semana'); ?>
		<?php echo $form->textField($model,'semana',array('class'=>'span2','maxlength'=>255)); ?>
		<?php echo $form->error($model,'semana'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'diaNombre'); ?>
		<?php echo $form->textField($model,'diaNombre',array('class'=>'span2','maxlength'=>255)); ?>
		<?php echo $form->error($model,'diaNombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'horas'); ?>
		<?php echo $form->textField($model,'horas',array('class'=>'span1','maxlength'=>255)); ?>
		<?php echo $form->error($model,'horas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'horas50'); ?>
		<?php echo $form->textField($model,'horas50',array('class'=>'span1','maxlength'=>255)); ?>
		<?php echo $form->error($model,'horas50'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'horas100'); ?>
		<?php echo $form->textField($model,'horas100',array('class'=>'span1','maxlength'=>255)); ?>
		<?php echo $form->error($model,'horas100'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'horas50Noct'); ?>
		<?php echo $form->textField($model,'horas50Noct',array('class'=>'span1','maxlength'=>255)); ?>
		<?php echo $form->error($model,'horas50Noct'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'horas100Noct'); ?>
		<?php echo $form->textField($model,'horas100Noct',array('class'=>'span1','maxlength'=>255)); ?>
		<?php echo $form->error($model,'horas100Noct'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idCategoria'); ?>
		<?php echo $form->textField($model,'idCategoria',array('class'=>'span1','maxlength'=>255)); ?>
		<?php echo $form->error($model,'idCategoria'); ?>
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->