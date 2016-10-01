<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idMantenimientoEmpresa'); ?>
		<?php echo $form->textField($model,'idMantenimientoEmpresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idClienteEmpresa'); ?>
		<?php echo $form->textField($model,'idClienteEmpresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaInicioEmpresa'); ?>
		<?php echo $form->textField($model,'fechaInicioEmpresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estadoMatenimiento'); ?>
		<?php echo $form->textField($model,'estadoMatenimiento',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cantidadVisitasMensuales'); ?>
		<?php echo $form->textField($model,'cantidadVisitasMensuales'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'datosRelevantes'); ?>
		<?php echo $form->textArea($model,'datosRelevantes',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipoMantenimiento'); ?>
		<?php echo $form->textField($model,'tipoMantenimiento',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->