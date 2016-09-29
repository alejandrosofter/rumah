<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idMantenimientoEmpresaVisitaRutina'); ?>
		<?php echo $form->textField($model,'idMantenimientoEmpresaVisitaRutina'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idMantenimientoEmpresa'); ?>
		<?php echo $form->textField($model,'idMantenimientoEmpresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'semana'); ?>
		<?php echo $form->textField($model,'semana'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreDia'); ?>
		<?php echo $form->textField($model,'nombreDia',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idDia'); ?>
		<?php echo $form->textField($model,'idDia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hora'); ?>
		<?php echo $form->textField($model,'hora'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'divisorSemana'); ?>
		<?php echo $form->textField($model,'divisorSemana'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'horaIngreso'); ?>
		<?php echo $form->textField($model,'horaIngreso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'horaSalida'); ?>
		<?php echo $form->textField($model,'horaSalida'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comentarioVisita'); ?>
		<?php echo $form->textField($model,'comentarioVisita',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->