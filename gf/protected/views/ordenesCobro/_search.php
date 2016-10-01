<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idOrdenCobro'); ?>
		<?php echo $form->textField($model,'idOrdenCobro'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaOrdenCobro'); ?>
		<?php echo $form->textField($model,'fechaOrdenCobro'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idCliente'); ?>
		<?php echo $form->textField($model,'idCliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'importeAcuenta'); ?>
		<?php echo $form->textField($model,'importeAcuenta'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->