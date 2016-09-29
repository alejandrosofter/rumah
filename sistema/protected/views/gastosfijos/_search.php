<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idGastoFijo'); ?>
		<?php echo $form->textField($model,'idGastoFijo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'importe'); ?>
		<?php echo $form->textField($model,'importe'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'detalle'); ?>
		<?php echo $form->textArea($model,'detalle',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idProveedor'); ?>
		<?php echo $form->textField($model,'idProveedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'periodicidadMeses'); ?>
		<?php echo $form->textField($model,'periodicidadMeses'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'esVariable'); ?>
		<?php echo $form->textField($model,'esVariable'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numeroDiaVence'); ?>
		<?php echo $form->textField($model,'numeroDiaVence'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaComienzo'); ?>
		<?php echo $form->textField($model,'fechaComienzo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->