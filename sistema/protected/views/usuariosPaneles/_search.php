<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idPanelUsuario'); ?>
		<?php echo $form->textField($model,'idPanelUsuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombrePanel'); ?>
		<?php echo $form->textField($model,'nombrePanel',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcionPanel'); ?>
		<?php echo $form->textArea($model,'descripcionPanel',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ayuda'); ?>
		<?php echo $form->textArea($model,'ayuda',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'linkAyuda'); ?>
		<?php echo $form->textField($model,'linkAyuda',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->