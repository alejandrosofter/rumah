<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idFacturaSalienteCorriente'); ?>
		<?php echo $form->textField($model,'idFacturaSalienteCorriente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idFacturaSaliente'); ?>
		<?php echo $form->textField($model,'idFacturaSaliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaDesde'); ?>
		<?php echo $form->textField($model,'fechaDesde'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaHasta'); ?>
		<?php echo $form->textField($model,'fechaHasta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estadoFactura'); ?>
		<?php echo $form->textField($model,'estadoFactura',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comentario'); ?>
		<?php echo $form->textArea($model,'comentario',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->