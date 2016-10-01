<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idFeriado'); ?>
		<?php echo $form->textField($model,'idFeriado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaFeriado'); ?>
		<?php echo $form->textField($model,'fechaFeriado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comentarioFeriado'); ?>
		<?php echo $form->textField($model,'comentarioFeriado',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->