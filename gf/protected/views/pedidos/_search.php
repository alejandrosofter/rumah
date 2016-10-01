<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idPedido'); ?>
		<?php echo $form->textField($model,'idPedido'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idFacturaSaliente'); ?>
		<?php echo $form->textField($model,'idFacturaSaliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaPedido'); ?>
		<?php echo $form->textField($model,'fechaPedido'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comentarioPedido'); ?>
		<?php echo $form->textArea($model,'comentarioPedido',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'datos'); ?>
		<?php echo $form->textArea($model,'datos',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->