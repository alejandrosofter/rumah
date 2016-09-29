<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idInventario'); ?>
		<?php echo $form->textField($model,'idInventario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaInventario'); ?>
		<?php echo $form->textField($model,'fechaInventario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcionInventario'); ?>
		<?php echo $form->textArea($model,'descripcionInventario',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'esPredeterminado'); ?>
		<?php echo $form->textField($model,'esPredeterminado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->