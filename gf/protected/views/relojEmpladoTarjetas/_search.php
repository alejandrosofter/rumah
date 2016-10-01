<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idEmpleadoTarjeta'); ?>
		<?php echo $form->textField($model,'idEmpleadoTarjeta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idEmpleado'); ?>
		<?php echo $form->textField($model,'idEmpleado',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idTarjeta'); ?>
		<?php echo $form->textField($model,'idTarjeta',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaTarjeta'); ?>
		<?php echo $form->textField($model,'fechaTarjeta'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->