<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rutinas-recursos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textField($model,'idRutina',array('TYPE'=>'hidden')); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idRecurso'); ?>
		<?php echo  $form->dropDownList($model,'idRecurso',CHtml::listData(RecursosOrdenesTrabajo::model()->findAll(), 'idOrdenTrabajoRecurso', 'nombre'),array ('onblur'=>"guiders.hideAll()",
                     'onfocus'=>"guiders.show('g_estado')"));?>
		<?php echo $form->error($model,'idRecurso'); ?>
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->