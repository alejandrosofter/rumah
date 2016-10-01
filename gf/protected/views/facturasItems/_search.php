<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('class'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idFactura'); ?>
		<?php echo $form->textField($model,'idFactura',array('class'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idProducto'); ?>
		<?php echo $form->textField($model,'idProducto',array('class'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'detalle'); ?>
		<?php echo $form->textArea($model,'detalle',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'importe'); ?>
		<?php echo $form->textField($model,'importe',array('class'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad',array('class'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total'); ?>
		<?php echo $form->textField($model,'total',array('class'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'interes'); ?>
		<?php echo $form->textField($model,'interes',array('class'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descuentos'); ?>
		<?php echo $form->textField($model,'descuentos',array('class'=>'')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->