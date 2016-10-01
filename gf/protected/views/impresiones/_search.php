<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idImpresion'); ?>
		<?php echo $form->textField($model,'idImpresion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idTipoImpresion'); ?>
		<?php echo $form->textField($model,'idTipoImpresion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipoImpresion'); ?>
		<?php echo $form->textField($model,'tipoImpresion',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaImpresion'); ?>
		<?php echo $form->textField($model,'fechaImpresion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'textoImpresion'); ?>
		<?php echo $form->textArea($model,'textoImpresion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaLastModifico'); ?>
		<?php echo $form->textField($model,'fechaLastModifico'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->