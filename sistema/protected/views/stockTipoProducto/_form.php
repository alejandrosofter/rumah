<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'stock-tipo-producto-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>



	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre'); ?>
		
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'porcentajeGananciaLista'); ?>
		<?php echo $form->textField($model,'porcentajeGananciaLista'); ?>
	
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'porcentajeGananciaMin'); ?>
		<?php echo $form->textField($model,'porcentajeGananciaMin'); ?>
		
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->