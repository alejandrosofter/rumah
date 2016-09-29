<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idSucursal'); ?>
		<?php echo $form->textField($model,'idSucursal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreSucursal'); ?>
		<?php echo $form->textField($model,'nombreSucursal',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'direccionSucursal'); ?>
		<?php echo $form->textField($model,'direccionSucursal',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefonoSucursal'); ?>
		<?php echo $form->textField($model,'telefonoSucursal',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->