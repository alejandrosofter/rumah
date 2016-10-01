<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idTipoTurno'); ?>
		<?php echo $form->textField($model,'idTipoTurno'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreTurno'); ?>
		<?php echo $form->textField($model,'nombreTurno',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->