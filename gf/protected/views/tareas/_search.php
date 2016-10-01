<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idTarea'); ?>
		<?php echo $form->textField($model,'idTarea'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaTarea'); ?>
		<?php echo $form->textField($model,'fechaTarea'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prioridadTarea'); ?>
		<?php echo $form->textField($model,'prioridadTarea',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estadoTarea'); ?>
		<?php echo $form->textField($model,'estadoTarea',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcionTarea'); ?>
		<?php echo $form->textArea($model,'descripcionTarea',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipoTarea'); ?>
		<?php echo $form->textField($model,'tipoTarea',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->