<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idTareasCoordinaciones'); ?>
		<?php echo $form->textField($model,'idTareasCoordinaciones'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idTarea'); ?>
		<?php echo $form->textField($model,'idTarea'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idEvento'); ?>
		<?php echo $form->textField($model,'idEvento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idCalendario'); ?>
		<?php echo $form->textField($model,'idCalendario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comentario'); ?>
		<?php echo $form->textField($model,'comentario',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->