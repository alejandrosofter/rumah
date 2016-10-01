<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idComentarioFicha'); ?>
		<?php echo $form->textField($model,'idComentarioFicha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idTipo'); ?>
		<?php echo $form->textField($model,'idTipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaComentario'); ?>
		<?php echo $form->textField($model,'fechaComentario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'detalleComentario'); ?>
		<?php echo $form->textArea($model,'detalleComentario',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idUsuario'); ?>
		<?php echo $form->textField($model,'idUsuario'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->