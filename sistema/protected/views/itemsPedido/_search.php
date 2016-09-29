<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idItemPedido'); ?>
		<?php echo $form->textField($model,'idItemPedido'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreItem'); ?>
		<?php echo $form->textField($model,'nombreItem',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'precioCompra'); ?>
		<?php echo $form->textField($model,'precioCompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'precioVenta'); ?>
		<?php echo $form->textField($model,'precioVenta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'porecentajeIva'); ?>
		<?php echo $form->textField($model,'porecentajeIva'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idStock'); ?>
		<?php echo $form->textField($model,'idStock'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idPedido'); ?>
		<?php echo $form->textField($model,'idPedido'); ?>
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