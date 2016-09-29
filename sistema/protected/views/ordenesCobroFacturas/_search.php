<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idOrdenCobroFacturas'); ?>
		<?php echo $form->textField($model,'idOrdenCobroFacturas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idOrdenCobro'); ?>
		<?php echo $form->textField($model,'idOrdenCobro'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idFacturaSaliente'); ?>
		<?php echo $form->textField($model,'idFacturaSaliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idFacturaVencimiento'); ?>
		<?php echo $form->textField($model,'idFacturaVencimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'importeCobroFactura'); ?>
		<?php echo $form->textField($model,'importeCobroFactura'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->