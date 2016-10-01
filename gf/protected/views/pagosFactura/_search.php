<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idPagoFactura'); ?>
		<?php echo $form->textField($model,'idPagoFactura'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idFacturaSaliente'); ?>
		<?php echo $form->textField($model,'idFacturaSaliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idPago'); ?>
		<?php echo $form->textField($model,'idPago'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estadoPagoFactura'); ?>
		<?php echo $form->textField($model,'estadoPagoFactura',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->