<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'condiciones-compra-form',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,'descripcion'),
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>50)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'generaFacturaCredito'); ?>
		<?php echo $form->textField($model,'generaFacturaCredito',array('size'=>1)); ?>
		
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->