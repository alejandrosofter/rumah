<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idMantenimientoRutina'); ?>
		<?php echo $form->textField($model,'idMantenimientoRutina'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idMantenimientoEmpresa'); ?>
		<?php echo $form->textField($model,'idMantenimientoEmpresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idRutina'); ?>
		<?php echo $form->textField($model,'idRutina'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comentario'); ?>
		<?php echo $form->textField($model,'comentario'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->