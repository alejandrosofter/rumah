<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idStock'); ?>
		<?php echo $form->textField($model,'idStock'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'detalle'); ?>
		<?php echo $form->textArea($model,'detalle',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codigoBarra'); ?>
		<?php echo $form->textField($model,'codigoBarra',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'porcentajeIva'); ?>
		<?php echo $form->textField($model,'porcentajeIva'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'min'); ?>
		<?php echo $form->textField($model,'min'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'max'); ?>
		<?php echo $form->textField($model,'max'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipoProducto'); ?>
		<?php echo $form->textField($model,'tipoProducto',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idTipoProducto'); ?>
		<?php echo $form->textField($model,'idTipoProducto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idCuenta'); ?>
		<?php echo $form->textField($model,'idCuenta'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->