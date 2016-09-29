<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idStockDisponible'); ?>
		<?php echo $form->textField($model,'idStockDisponible'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idStock'); ?>
		<?php echo $form->textField($model,'idStock'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cantidadDisponible'); ?>
		<?php echo $form->textField($model,'cantidadDisponible'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'auxiliarStock'); ?>
		<?php echo $form->textField($model,'auxiliarStock'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'auxiliarDisponible'); ?>
		<?php echo $form->textField($model,'auxiliarDisponible'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->