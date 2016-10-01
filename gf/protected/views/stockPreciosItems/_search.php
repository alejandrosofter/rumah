<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idStockPrecioStock'); ?>
		<?php echo $form->textField($model,'idStockPrecioStock'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idStockPrecio'); ?>
		<?php echo $form->textField($model,'idStockPrecio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idStock'); ?>
		<?php echo $form->textField($model,'idStock'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'importePesosStock'); ?>
		<?php echo $form->textField($model,'importePesosStock'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'importeDolarStock'); ?>
		<?php echo $form->textField($model,'importeDolarStock'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->