<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idOrdenesCoordinaciones'); ?>
		<?php echo $form->textField($model,'idOrdenesCoordinaciones'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idOrdenes'); ?>
		<?php echo $form->textField($model,'idOrdenes'); ?>
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