<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idTalonario'); ?>
		<?php echo $form->textField($model,'idTalonario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idPuntoVenta'); ?>
		<?php echo $form->textField($model,'idPuntoVenta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'desdeNumero'); ?>
		<?php echo $form->textField($model,'desdeNumero'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hastaNumero'); ?>
		<?php echo $form->textField($model,'hastaNumero'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'proximo'); ?>
		<?php echo $form->textField($model,'proximo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'letraTalonario'); ?>
		<?php echo $form->textField($model,'letraTalonario',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipoTalonario'); ?>
		<?php echo $form->textField($model,'tipoTalonario',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numeroSerie'); ?>
		<?php echo $form->textField($model,'numeroSerie'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->