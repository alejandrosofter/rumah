<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'clasificacion-afip-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombreClasificacionAfip'); ?>
		<?php echo $form->textField($model,'nombreClasificacionAfip',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombreClasificacionAfip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigoClasificacion'); ?>
		<?php echo $form->textField($model,'codigoClasificacion',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'codigoClasificacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'detalle'); ?>
		<?php echo $form->textField($model,'detalle',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'detalle'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->