<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idCondicionVenta'); ?>
		<?php echo $form->textField($model,'idCondicionVenta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcionVenta'); ?>
		<?php echo $form->textField($model,'descripcionVenta',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'generaFacturaCredito'); ?>
		<?php echo $form->textField($model,'generaFacturaCredito',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->