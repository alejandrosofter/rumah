<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuarios-areas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	

	<div class="row">
		<?php echo $form->labelEx($model,'nombreArea'); ?>
		<?php echo $form->textField($model,'nombreArea',array('size'=>60,'maxlength'=>255)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'centroCosto'); ?>
		<?php echo $form->textField($model,'centroCosto'); ?>
		
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->