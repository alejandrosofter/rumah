<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idUsuarioArea'); ?>
		<?php echo $form->textField($model,'idUsuarioArea'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreArea'); ?>
		<?php echo $form->textField($model,'nombreArea',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'centroCosto'); ?>
		<?php echo $form->textField($model,'centroCosto'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->