<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idFacturaConcepto'); ?>
		<?php echo $form->textField($model,'idFacturaConcepto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idFacturaEntrante'); ?>
		<?php echo $form->textField($model,'idFacturaEntrante'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idConcepto'); ?>
		<?php echo $form->textField($model,'idConcepto'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->