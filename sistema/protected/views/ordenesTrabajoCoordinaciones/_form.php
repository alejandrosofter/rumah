<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ordenes-trabajo-coordinaciones-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idOrdenes'); ?>
		<?php echo $form->textField($model,'idOrdenes'); ?>
		<?php echo $form->error($model,'idOrdenes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idEvento'); ?>
		<?php echo $form->textField($model,'idEvento'); ?>
		<?php echo $form->error($model,'idEvento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idCalendario'); ?>
		<?php echo $form->textField($model,'idCalendario'); ?>
		<?php echo $form->error($model,'idCalendario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comentario'); ?>
		<?php echo $form->textField($model,'comentario',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'comentario'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->