<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idOrdenTrabajoRutinaEstado'); ?>
		<?php echo $form->textField($model,'idOrdenTrabajoRutinaEstado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idRutina'); ?>
		<?php echo $form->textField($model,'idRutina'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dias'); ?>
		<?php echo $form->textField($model,'dias'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'detalle'); ?>
		<?php echo $form->textField($model,'detalle',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nroEstado'); ?>
		<?php echo $form->textField($model,'nroEstado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'costoTiempo'); ?>
		<?php echo $form->textField($model,'costoTiempo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->