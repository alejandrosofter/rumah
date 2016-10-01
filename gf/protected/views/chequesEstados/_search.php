<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idEstadoCheque'); ?>
		<?php echo $form->textField($model,'idEstadoCheque'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idCheque'); ?>
		<?php echo $form->textField($model,'idCheque'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreEstado'); ?>
		<?php echo $form->textField($model,'nombreEstado',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->