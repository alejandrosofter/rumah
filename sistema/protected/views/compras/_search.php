<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idCompra'); ?>
		<?php echo $form->textField($model,'idCompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaCompra'); ?>
		<?php echo $form->textField($model,'fechaCompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idFacturaEntrante'); ?>
		<?php echo $form->textField($model,'idFacturaEntrante'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcionCompra'); ?>
		<?php echo $form->textArea($model,'descripcionCompra',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'importeDolar'); ?>
		<?php echo $form->textField($model,'importeDolar'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->