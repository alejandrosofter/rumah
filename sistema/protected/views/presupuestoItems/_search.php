<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idItemPresupuesto'); ?>
		<?php echo $form->textField($model,'idItemPresupuesto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idPresupuesto'); ?>
		<?php echo $form->textField($model,'idPresupuesto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idStock'); ?>
		<?php echo $form->textField($model,'idStock'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'precioVenta'); ?>
		<?php echo $form->textField($model,'precioVenta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreStock'); ?>
		<?php echo $form->textField($model,'nombreStock',array('size'=>60,'maxlength'=>180)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cantidadItems'); ?>
		<?php echo $form->textField($model,'cantidadItems'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'porcentajeIva'); ?>
		<?php echo $form->textField($model,'porcentajeIva'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->