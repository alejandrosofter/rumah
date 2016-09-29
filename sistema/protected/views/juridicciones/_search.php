<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idJuridiccion'); ?>
		<?php echo $form->textField($model,'idJuridiccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreJuridiccion'); ?>
		<?php echo $form->textField($model,'nombreJuridiccion',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codigoJuridiccion'); ?>
		<?php echo $form->textField($model,'codigoJuridiccion',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->