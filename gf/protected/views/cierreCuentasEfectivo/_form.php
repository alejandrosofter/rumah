<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cierre-cuentas-efectivo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaCierreCuenta'); ?>
		<?php echo $form->textField($model,'fechaCierreCuenta'); ?>
		<?php echo $form->error($model,'fechaCierreCuenta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idCuentaEfectivo'); ?>
		<?php echo $form->textField($model,'idCuentaEfectivo'); ?>
		<?php echo $form->error($model,'idCuentaEfectivo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'importeDineroSistema'); ?>
		<?php echo $form->textField($model,'importeDineroSistema'); ?>
		<?php echo $form->error($model,'importeDineroSistema'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'importeDineroExistente'); ?>
		<?php echo $form->textField($model,'importeDineroExistente'); ?>
		<?php echo $form->error($model,'importeDineroExistente'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->