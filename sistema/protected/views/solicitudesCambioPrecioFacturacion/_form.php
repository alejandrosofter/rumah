<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'solicitudes-cambio-precio-facturacion-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idStock'); ?>
		<?php echo $form->textField($model,'idStock'); ?>
		<?php echo $form->error($model,'idStock'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'importeLista'); ?>
		<?php echo $form->textField($model,'importeLista'); ?>
		<?php echo $form->error($model,'importeLista'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'importeDescontado'); ?>
		<?php echo $form->textField($model,'importeDescontado'); ?>
		<?php echo $form->error($model,'importeDescontado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idUsuario'); ?>
		<?php echo $form->textField($model,'idUsuario'); ?>
		<?php echo $form->error($model,'idUsuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nroInterno'); ?>
		<?php echo $form->textField($model,'nroInterno'); ?>
		<?php echo $form->error($model,'nroInterno'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->