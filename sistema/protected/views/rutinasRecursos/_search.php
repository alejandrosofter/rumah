<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idRutinaIdRecurso'); ?>
		<?php echo $form->textField($model,'idRutinaIdRecurso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idRutina'); ?>
		<?php echo $form->textField($model,'idRutina'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idRecurso'); ?>
		<?php echo $form->textField($model,'idRecurso'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->