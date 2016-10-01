<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'punto-venta-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	

	<div class="row">
		<?php echo $form->labelEx($model,'nombrePuntoVenta'); ?>
		<?php echo $form->textField($model,'nombrePuntoVenta',array('size'=>60,'maxlength'=>255)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcionPuntoVenta'); ?>
		<?php echo $form->textField($model,'descripcionPuntoVenta'); ?>
		
	</div>


	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->