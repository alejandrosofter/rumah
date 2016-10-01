<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idFacturaRespuesta'); ?>
		<?php echo $form->textField($model,'idFacturaRespuesta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idFacturaSaliente'); ?>
		<?php echo $form->textField($model,'idFacturaSaliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cae'); ?>
		<?php echo $form->textField($model,'cae',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaVence'); ?>
		<?php echo $form->textField($model,'fechaVence',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eventos'); ?>
		<?php echo $form->textField($model,'eventos',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'errores'); ?>
		<?php echo $form->textField($model,'errores',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->