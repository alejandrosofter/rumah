<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idPreventaEmpresaNombreEstado'); ?>
		<?php echo $form->textField($model,'idPreventaEmpresaNombreEstado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreEstado'); ?>
		<?php echo $form->textField($model,'nombreEstado',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->