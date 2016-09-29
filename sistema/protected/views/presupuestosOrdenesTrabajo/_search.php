<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idPresupuestoOrden'); ?>
		<?php echo $form->textField($model,'idPresupuestoOrden'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idPresupuesto'); ?>
		<?php echo $form->textField($model,'idPresupuesto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idOrdenTrabajo'); ?>
		<?php echo $form->textField($model,'idOrdenTrabajo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->