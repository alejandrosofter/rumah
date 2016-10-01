<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idRecepcion'); ?>
		<?php echo $form->textField($model,'idRecepcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idCliente'); ?>
		<?php echo $form->textField($model,'idCliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcionRecepcion'); ?>
		<?php echo $form->textArea($model,'descripcionRecepcion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaRecepcion'); ?>
		<?php echo $form->textField($model,'fechaRecepcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipoRecepcion'); ?>
		<?php echo $form->textField($model,'tipoRecepcion',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idRecepcionPadre'); ?>
		<?php echo $form->textField($model,'idRecepcionPadre'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estadoRecepcion'); ?>
		<?php echo $form->textField($model,'estadoRecepcion',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->