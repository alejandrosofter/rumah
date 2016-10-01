<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'facturas-items-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idFactura',array('class'=>'')); ?>
		<?php echo $form->textField($model,'idFactura',array('class'=>'')); ?>
		<?php echo $form->error($model,'idFactura'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idProducto',array('class'=>'')); ?>
		<?php echo $form->textField($model,'idProducto',array('class'=>'')); ?>
		<?php echo $form->error($model,'idProducto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'detalle',array('class'=>'')); ?>
		<?php echo $form->textArea($model,'detalle',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'detalle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'importe',array('class'=>'')); ?>
		<?php echo $form->textField($model,'importe',array('class'=>'')); ?>
		<?php echo $form->error($model,'importe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidad',array('class'=>'')); ?>
		<?php echo $form->textField($model,'cantidad',array('class'=>'')); ?>
		<?php echo $form->error($model,'cantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total',array('class'=>'')); ?>
		<?php echo $form->textField($model,'total',array('class'=>'')); ?>
		<?php echo $form->error($model,'total'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'interes',array('class'=>'')); ?>
		<?php echo $form->textField($model,'interes',array('class'=>'')); ?>
		<?php echo $form->error($model,'interes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descuentos',array('class'=>'')); ?>
		<?php echo $form->textField($model,'descuentos',array('class'=>'')); ?>
		<?php echo $form->error($model,'descuentos'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->