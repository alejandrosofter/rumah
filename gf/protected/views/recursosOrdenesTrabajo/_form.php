<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'recursos-ordenes-trabajo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idTipoRecurso'); ?>
		<?php echo  $form->dropDownList($model,'idTipoRecurso',CHtml::listData(RecursosTipoRecursosOrdenesTrabajo::model()->findAll(), 'idOrdenTrabajoTipoRecurso', 'nombreTipoRecurso'),array ('onblur'=>"guiders.hideAll()",
                     'onfocus'=>"guiders.show('g_estado')"));?>
		<?php echo $form->error($model,'idTipoRecurso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('class'=>'span7','maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('class'=>'span6','rows'=>3)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->