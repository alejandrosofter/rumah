<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idStockMarcas'); ?>
		<?php echo $form->textField($model,'idStockMarcas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreMarca'); ?>
		<?php echo $form->textField($model,'nombreMarca',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'adicionalNumeroMarca'); ?>
		<?php echo $form->textField($model,'adicionalNumeroMarca'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'adicionalCadenaMarca'); ?>
		<?php echo $form->textField($model,'adicionalCadenaMarca',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->