<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reloj-emplado-tarjetas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

<!-- Formulario de creación de tarjetas, idEmpleado esta oculto -->
	<?php echo $form->textField($model,'idEmpleado',array('TYPE'=>'hidden','size'=>60,'maxlength'=>255)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idTarjeta'); ?>
		<?php echo $form->textField($model,'idTarjeta',array('class'=>'span2','maxlength'=>255)); ?>
		<?php echo $form->error($model,'idTarjeta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaTarjeta'); ?>
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaTarjeta'))?>
		<?php echo $form->error($model,'fechaTarjeta'); ?>
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->