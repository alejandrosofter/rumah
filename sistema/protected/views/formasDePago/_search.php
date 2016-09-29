<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idFormaPago'); ?>
		<?php echo $form->textField($model,'idFormaPago'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreForma'); ?>
		<?php echo $form->textField($model,'nombreForma',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipoForma'); ?>
		<?php echo $form->textField($model,'tipoForma',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cantidadCuotas'); ?>
		<?php echo $form->textField($model,'cantidadCuotas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'intereses'); ?>
		<?php echo $form->textField($model,'intereses'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ingresoEgreso'); ?>
		<?php echo $form->textField($model,'ingresoEgreso'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->