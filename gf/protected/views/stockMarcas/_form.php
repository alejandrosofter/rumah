<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'stock-marcas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	

	<div class="row">
		<?php echo $form->labelEx($model,'nombreMarca'); ?>
		<?php echo $form->textField($model,'nombreMarca',array('size'=>60,'maxlength'=>255)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adicionalNumeroMarca'); ?>
		<?php echo $form->textField($model,'adicionalNumeroMarca'); ?>
	
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adicionalCadenaMarca'); ?>
		<?php echo $form->textField($model,'adicionalCadenaMarca',array('size'=>60,'maxlength'=>255)); ?>
		
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->