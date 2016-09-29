<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idCondicionVentaItem'); ?>
		<?php echo $form->textField($model,'idCondicionVentaItem'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idCondicionVenta'); ?>
		<?php echo $form->textField($model,'idCondicionVenta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'porcentajeTotalFacturado'); ?>
		<?php echo $form->textField($model,'porcentajeTotalFacturado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cantidadCuotas'); ?>
		<?php echo $form->textField($model,'cantidadCuotas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'aVencerEnDias'); ?>
		<?php echo $form->textField($model,'aVencerEnDias'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CantidadDiasMesesCuotas'); ?>
		<?php echo $form->textField($model,'CantidadDiasMesesCuotas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'porcentajeInteres'); ?>
		<?php echo $form->textField($model,'porcentajeInteres'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaVencimiento'); ?>
		<?php echo $form->textField($model,'fechaVencimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'calculo'); ?>
		<?php echo $form->textField($model,'calculo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->