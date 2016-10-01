<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idInventarioProducto'); ?>
		<?php echo $form->textField($model,'idInventarioProducto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idInventario'); ?>
		<?php echo $form->textField($model,'idInventario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaProductoInventario'); ?>
		<?php echo $form->textField($model,'fechaProductoInventario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idStockInventario'); ?>
		<?php echo $form->textField($model,'idStockInventario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cantidadInventario'); ?>
		<?php echo $form->textField($model,'cantidadInventario'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->