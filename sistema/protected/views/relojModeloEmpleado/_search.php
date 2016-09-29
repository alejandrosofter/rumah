<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idCategoria'); ?>
		<?php echo $form->textField($model,'idCategoria'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'diaInicio'); ?>
		<?php echo $form->textField($model,'diaInicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'diaFin'); ?>
		<?php echo $form->textField($model,'diaFin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nroDiaInicio'); ?>
		<?php echo $form->textField($model,'nroDiaInicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nroDiaFin'); ?>
		<?php echo $form->textField($model,'nroDiaFin'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->