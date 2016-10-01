<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ordenes-trabajo-stock-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textField($model,'idStock',array('TYPE'=>'hidden')); ?>


		<?php echo $form->textField($model,'idOrdenTrabajo',array('TYPE'=>'hidden')); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'nombreStock'); ?>
		<?php echo $form->textField($model,'nombreStock',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombreStock'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'porcentajeIva'); ?>
		<?php echo $form->textField($model,'porcentajeIva'); ?>
		<?php echo $form->error($model,'porcentajeIva'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'importe'); ?>
		<?php echo $form->textField($model,'importe'); ?>
		<?php echo $form->error($model,'importe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad'); ?>
		<?php echo $form->error($model,'cantidad'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->