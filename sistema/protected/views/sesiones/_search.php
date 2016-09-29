<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idSesion'); ?>
		<?php echo $form->textField($model,'idSesion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idUsuario'); ?>
		<?php echo $form->textField($model,'idUsuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaIngresa'); ?>
		<?php echo $form->textField($model,'fechaIngresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaEgresa'); ?>
		<?php echo $form->textField($model,'fechaEgresa'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->