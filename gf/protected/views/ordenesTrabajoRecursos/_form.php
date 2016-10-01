<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ordenes-trabajo-recursos-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idOrdenTrabajo'); ?>
		<?php echo $form->textField($model,'idOrdenTrabajo'); ?>
		<?php echo $form->error($model,'idOrdenTrabajo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idRecurso'); ?>
		<?php echo $form->textField($model,'idRecurso'); ?>
		<?php echo $form->error($model,'idRecurso'); ?>
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Save',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->