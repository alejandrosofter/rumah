<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idConcepto'); ?>
		<?php echo $form->textField($model,'idConcepto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreConcepto'); ?>
		<?php echo $form->textArea($model,'nombreConcepto',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idCuentaContable'); ?>
		<?php echo $form->textField($model,'idCuentaContable'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codigoConcepto'); ?>
		<?php echo $form->textField($model,'codigoConcepto',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->