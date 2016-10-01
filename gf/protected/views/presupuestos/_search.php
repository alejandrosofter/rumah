<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idPresupuesto'); ?>
		<?php echo $form->textField($model,'idPresupuesto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaPresupuesto'); ?>
		<?php echo $form->textField($model,'fechaPresupuesto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcionPresupuesto'); ?>
		<?php echo $form->textArea($model,'descripcionPresupuesto',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asuntoPresupuesto'); ?>
		<?php echo $form->textField($model,'asuntoPresupuesto',array('size'=>60,'maxlength'=>180)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idClientePresupuesto'); ?>
		<?php echo $form->textField($model,'idClientePresupuesto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaVencimiento'); ?>
		<?php echo $form->textField($model,'fechaVencimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'precioEspecial'); ?>
		<?php echo $form->textField($model,'precioEspecial'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'formaPago'); ?>
		<?php echo $form->textField($model,'formaPago',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaentrega'); ?>
		<?php echo $form->textField($model,'fechaentrega'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'porcentajeIva'); ?>
		<?php echo $form->textField($model,'porcentajeIva',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipoPresupuesto'); ?>
		<?php echo $form->textField($model,'tipoPresupuesto',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->