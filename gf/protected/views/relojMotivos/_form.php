<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reloj-motivos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'porcentajeCubre'); ?>
		<?php echo $form->textField($model,'porcentajeCubre',array('size'=>5,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'porcentajeCubre'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->