<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gastosfijos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'importe'); ?>
		<?php echo $form->textField($model,'importe'); ?>
		<?php echo $form->error($model,'importe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'detalle'); ?>
		<?php echo $form->textArea($model,'detalle',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'detalle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idProveedor'); ?>
		<?php echo $form->textField($model,'idProveedor'); ?>
		<?php echo $form->error($model,'idProveedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'periodicidadMeses'); ?>
		<?php echo $form->textField($model,'periodicidadMeses'); ?>
		<?php echo $form->error($model,'periodicidadMeses'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'esVariable'); ?>
		<?php echo $form->textField($model,'esVariable'); ?>
		<?php echo $form->error($model,'esVariable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numeroDiaVence'); ?>
		<?php echo $form->textField($model,'numeroDiaVence'); ?>
		<?php echo $form->error($model,'numeroDiaVence'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaComienzo'); ?>
		<?php echo $form->textField($model,'fechaComienzo'); ?>
		<?php echo $form->error($model,'fechaComienzo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->