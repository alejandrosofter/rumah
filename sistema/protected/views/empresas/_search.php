<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idEmpresa'); ?>
		<?php echo $form->textField($model,'idEmpresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreEmpresa'); ?>
		<?php echo $form->textField($model,'nombreEmpresa',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'esDefault'); ?>
		<?php echo $form->textField($model,'esDefault'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->