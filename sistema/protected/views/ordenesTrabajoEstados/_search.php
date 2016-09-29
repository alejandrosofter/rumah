<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idEstadoOrden'); ?>
		<?php echo $form->textField($model,'idEstadoOrden'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaEstado'); ?>
		<?php echo $form->textField($model,'fechaEstado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idUsuario'); ?>
		<?php echo $form->textField($model,'idUsuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idOrdenTrabajo'); ?>
		<?php echo $form->textField($model,'idOrdenTrabajo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'detalleEstado'); ?>
		<?php echo $form->textArea($model,'detalleEstado',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->