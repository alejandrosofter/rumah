<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idCierreCuenta'); ?>
		<?php echo $form->textField($model,'idCierreCuenta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaCierreCuenta'); ?>
		<?php echo $form->textField($model,'fechaCierreCuenta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idCuentaEfectivo'); ?>
		<?php echo $form->textField($model,'idCuentaEfectivo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'importeDineroSistema'); ?>
		<?php echo $form->textField($model,'importeDineroSistema'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'importeDineroExistente'); ?>
		<?php echo $form->textField($model,'importeDineroExistente'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->