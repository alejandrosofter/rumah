<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idStockOrden'); ?>
		<?php echo $form->textField($model,'idStockOrden'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idStock'); ?>
		<?php echo $form->textField($model,'idStock'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idOrdenTrabajo'); ?>
		<?php echo $form->textField($model,'idOrdenTrabajo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreStock'); ?>
		<?php echo $form->textField($model,'nombreStock',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'porcentajeIva'); ?>
		<?php echo $form->textField($model,'porcentajeIva'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'importe'); ?>
		<?php echo $form->textField($model,'importe'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->