<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idMensaje'); ?>
		<?php echo $form->textField($model,'idMensaje'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cuerpoMensaje'); ?>
		<?php echo $form->textArea($model,'cuerpoMensaje',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tituloMensaje'); ?>
		<?php echo $form->textField($model,'tituloMensaje',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipoMensaje'); ?>
		<?php echo $form->textField($model,'tipoMensaje',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaMensaje'); ?>
		<?php echo $form->textField($model,'fechaMensaje'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'destinatario'); ?>
		<?php echo $form->textField($model,'destinatario',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'remitente'); ?>
		<?php echo $form->textField($model,'remitente',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->