<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'items-pedido-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombreItem'); ?>
		<?php echo $form->textField($model,'nombreItem',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombreItem'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'precioCompra'); ?>
		<?php echo $form->textField($model,'precioCompra'); ?>
		<?php echo $form->error($model,'precioCompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'precioVenta'); ?>
		<?php echo $form->textField($model,'precioVenta'); ?>
		<?php echo $form->error($model,'precioVenta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'porecentajeIva'); ?>
		<?php echo $form->textField($model,'porecentajeIva'); ?>
		<?php echo $form->error($model,'porecentajeIva'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idStock'); ?>
		<?php echo $form->textField($model,'idStock'); ?>
		<?php echo $form->error($model,'idStock'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idPedido'); ?>
		<?php echo $form->textField($model,'idPedido'); ?>
		<?php echo $form->error($model,'idPedido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad'); ?>
		<?php echo $form->error($model,'cantidad'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->