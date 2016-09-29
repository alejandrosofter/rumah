<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idTareaEstado'); ?>
		<?php echo $form->textField($model,'idTareaEstado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idTarea'); ?>
		<?php echo $form->textField($model,'idTarea'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaEstadoTarea'); ?>
		<?php echo $form->textField($model,'fechaEstadoTarea'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'detalleEstadoTarea'); ?>
		<?php echo $form->textArea($model,'detalleEstadoTarea',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreEstado'); ?>
		<?php echo $form->textField($model,'nombreEstado',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->