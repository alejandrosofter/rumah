<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ordenes-trabajo-items-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad'); ?>
		<?php echo $form->error($model,'cantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'item'); ?>
		<?php echo $form->textField($model,'item',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'item'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'importe'); ?>
		<?php echo $form->textField($model,'importe'); ?>
		<?php echo $form->error($model,'importe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'porcentajeIva'); ?>
		<?php echo $form->textField($model,'porcentajeIva'); ?>
		<?php echo $form->error($model,'porcentajeIva'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idStock'); ?>
		<?php echo $form->textField($model,'idStock'); ?>
		<?php echo $form->error($model,'idStock'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estadoItem'); ?>
		<?php echo $form->textField($model,'estadoItem',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'estadoItem'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idOrdenTrabajo'); ?>
		<?php echo $form->textField($model,'idOrdenTrabajo'); ?>
		<?php echo $form->error($model,'idOrdenTrabajo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->