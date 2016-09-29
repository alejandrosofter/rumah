<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'facturas-salientes-respuesta-electronica-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idFacturaSaliente'); ?>
		<?php echo $form->textField($model,'idFacturaSaliente'); ?>
		<?php echo $form->error($model,'idFacturaSaliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cae'); ?>
		<?php echo $form->textField($model,'cae',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'cae'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaVence'); ?>
		<?php echo $form->textField($model,'fechaVence',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'fechaVence'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'eventos'); ?>
		<?php echo $form->textField($model,'eventos',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'eventos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'errores'); ?>
		<?php echo $form->textField($model,'errores',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'errores'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->