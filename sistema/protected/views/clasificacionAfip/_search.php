<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idClasificacionAfip'); ?>
		<?php echo $form->textField($model,'idClasificacionAfip'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreClasificacionAfip'); ?>
		<?php echo $form->textField($model,'nombreClasificacionAfip',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codigoClasificacion'); ?>
		<?php echo $form->textField($model,'codigoClasificacion',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'detalle'); ?>
		<?php echo $form->textField($model,'detalle',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->