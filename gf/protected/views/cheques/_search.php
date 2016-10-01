<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idCheque'); ?>
		<?php echo $form->textField($model,'idCheque'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaEmision'); ?>
		<?php echo $form->textField($model,'fechaEmision'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaCobro'); ?>
		<?php echo $form->textField($model,'fechaCobro'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idCliente'); ?>
		<?php echo $form->textField($model,'idCliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'paguese'); ?>
		<?php echo $form->textArea($model,'paguese',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'importe'); ?>
		<?php echo $form->textField($model,'importe'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'esCruzado'); ?>
		<?php echo $form->textField($model,'esCruzado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idCuenta'); ?>
		<?php echo $form->textField($model,'idCuenta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numeroCheque'); ?>
		<?php echo $form->textField($model,'numeroCheque'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->