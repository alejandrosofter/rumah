<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idEstadoRecepcion'); ?>
		<?php echo $form->textField($model,'idEstadoRecepcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idRecepcion'); ?>
		<?php echo $form->textField($model,'idRecepcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaEstadoRecepcion'); ?>
		<?php echo $form->textField($model,'fechaEstadoRecepcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcionEstadoRecepcion'); ?>
		<?php echo $form->textArea($model,'descripcionEstadoRecepcion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idUsuarioEstado'); ?>
		<?php echo $form->textField($model,'idUsuarioEstado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estadoEstadoRecepcion'); ?>
		<?php echo $form->textField($model,'estadoEstadoRecepcion',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->