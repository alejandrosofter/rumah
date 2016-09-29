<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idPuntoVenta'); ?>
		<?php echo $form->textField($model,'idPuntoVenta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombrePuntaVenta'); ?>
		<?php echo $form->textField($model,'nombrePuntaVenta',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcionPuntoVenta'); ?>
		<?php echo $form->textField($model,'descripcionPuntoVenta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'electronica'); ?>
		<?php echo $form->textField($model,'electronica',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->