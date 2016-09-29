<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idFacturaEntrante'); ?>
		<?php echo $form->textField($model,'idFacturaEntrante'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idProveedor'); ?>
		<?php echo $form->textField($model,'idProveedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaVencimiento'); ?>
		<?php echo $form->textField($model,'fechaVencimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numeroFactura'); ?>
		<?php echo $form->textField($model,'numeroFactura',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'precio'); ?>
		<?php echo $form->textField($model,'precio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>29,'maxlength'=>29)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipoFactura'); ?>
		<?php echo $form->textField($model,'tipoFactura',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idCentroCosto'); ?>
		<?php echo $form->textField($model,'idCentroCosto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'iva21'); ?>
		<?php echo $form->textField($model,'iva21'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'iva105'); ?>
		<?php echo $form->textField($model,'iva105'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->