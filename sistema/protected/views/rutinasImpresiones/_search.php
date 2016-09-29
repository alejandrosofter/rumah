<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idRutinaImpresion'); ?>
		<?php echo $form->textField($model,'idRutinaImpresion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idRutina'); ?>
		<?php echo $form->textField($model,'idRutina'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'detalleImpresion'); ?>
		<?php echo $form->textArea($model,'detalleImpresion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cantidadDefecto'); ?>
		<?php echo $form->textField($model,'cantidadDefecto'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->