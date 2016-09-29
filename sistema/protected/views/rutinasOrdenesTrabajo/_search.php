<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idOrdenTrabajoRutina'); ?>
		<?php echo $form->textField($model,'idOrdenTrabajoRutina'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreRutina'); ?>
		<?php echo $form->textField($model,'nombreRutina',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'esFacturable'); ?>
		<?php echo $form->textField($model,'esFacturable'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'esContratada'); ?>
		<?php echo $form->textField($model,'esContratada'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'duracionDias'); ?>
		<?php echo $form->textField($model,'duracionDias'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prioridad'); ?>
		<?php echo $form->textField($model,'prioridad',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcionCliente'); ?>
		<?php echo $form->textField($model,'descripcionCliente',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcionEncargado'); ?>
		<?php echo $form->textField($model,'descripcionEncargado',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->