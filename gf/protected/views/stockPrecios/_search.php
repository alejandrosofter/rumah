<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idStockPrecio'); ?>
		<?php echo $form->textField($model,'idStockPrecio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaStock'); ?>
		<?php echo $form->textField($model,'fechaStock'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enServicios'); ?>
		<?php echo $form->textField($model,'enServicios'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idTipo'); ?>
		<?php echo $form->textField($model,'idTipo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->