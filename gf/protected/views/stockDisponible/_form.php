<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'stock-disponible-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textField($model,'idStock',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidadDisponible'); ?>
		<?php echo $form->textField($model,'cantidadDisponible'); ?>
		<?php echo $form->error($model,'cantidadDisponible'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->