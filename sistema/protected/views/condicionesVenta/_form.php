<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'condiciones-venta-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcionVenta'); ?>
		<?php echo $form->textField($model,'descripcionVenta',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'descripcionVenta'); ?>
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->