<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pedidos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idFacturaSaliente'); ?>
		<?php echo $form->textField($model,'idFacturaSaliente'); ?>
		<?php echo $form->error($model,'idFacturaSaliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaPedido'); ?>
		<?php echo $form->textField($model,'fechaPedido'); ?>
		<?php echo $form->error($model,'fechaPedido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comentarioPedido'); ?>
		<?php echo $form->textArea($model,'comentarioPedido',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comentarioPedido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'datos'); ?>
		<?php echo $form->textArea($model,'datos',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'datos'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->