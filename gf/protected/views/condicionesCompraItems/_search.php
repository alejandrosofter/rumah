<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idCondicionCompraItem'); ?>
		<?php echo $form->textField($model,'idCondicionCompraItem'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idCondicionCompra'); ?>
		<?php echo $form->textField($model,'idCondicionCompra'); ?>
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
		<?php echo $form->label($model,'cantidadDiasMeses'); ?>
		<?php echo $form->textField($model,'cantidadDiasMeses'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unidadCantidad'); ?>
		<?php echo $form->textField($model,'unidadCantidad',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->