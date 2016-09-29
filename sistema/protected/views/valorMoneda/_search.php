<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idValorMoneda'); ?>
		<?php echo $form->textField($model,'idValorMoneda'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idTipoMoneda'); ?>
		<?php echo $form->textField($model,'idTipoMoneda'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valorCompra'); ?>
		<?php echo $form->textField($model,'valorCompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valorVenta'); ?>
		<?php echo $form->textField($model,'valorVenta'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->