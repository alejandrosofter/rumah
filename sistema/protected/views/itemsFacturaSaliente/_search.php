<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idItemsFacturaSaliente'); ?>
		<?php echo $form->textField($model,'idItemsFacturaSaliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idElemento'); ?>
		<?php echo $form->textField($model,'idElemento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreItem'); ?>
		<?php echo $form->textField($model,'nombreItem',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'importeItem'); ?>
		<?php echo $form->textField($model,'importeItem'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'porcentajeIva'); ?>
		<?php echo $form->textField($model,'porcentajeIva',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'masIva'); ?>
		<?php echo $form->textField($model,'masIva'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->