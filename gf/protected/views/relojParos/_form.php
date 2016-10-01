<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reloj-paros-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaParo'); ?>
		<?php echo $form->textField($model,'fechaParo'); ?>
		<?php echo $form->error($model,'fechaParo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comentarioParo'); ?>
		<?php echo $form->textField($model,'comentarioParo',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'comentarioParo'); ?>
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->