<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idTareaDestinantario'); ?>
		<?php echo $form->textField($model,'idTareaDestinantario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idTarea'); ?>
		<?php echo $form->textField($model,'idTarea'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idUsuario'); ?>
		<?php echo $form->textField($model,'idUsuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'notificarArea'); ?>
		<?php echo $form->textField($model,'notificarArea'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->