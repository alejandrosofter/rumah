<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reloj-incidencias-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idEmpleado'); ?>
		<?php echo $form->dropDownList($model,'idEmpleado',CHtml::listData(RelojEmpleados::model()->findAll(),
	     'idEmpleado', 'nombreEmpleado'),array ('prompt'=>'Seleccione...'));?>
		<?php echo $form->error($model,'idEmpleado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaInicio'); ?>
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaInicio'))?>
		<?php echo $form->error($model,'fechaInicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaFin'); ?>
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaFin'))?>
		<?php echo $form->error($model,'fechaFin'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'esJustificado'); ?>
		<?php echo $form->checkBox($model,'esJustificado'); ?>
		<?php echo $form->error($model,'esJustificado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idMotivos'); ?>
		<?php echo $form->dropDownList($model,'idMotivos',CHtml::listData(RelojMotivos::model()->findAll(),
	     'id', 'nombre'),array ('prompt'=>'Seleccione...'));?>
		<?php echo $form->error($model,'idMotivos'); ?>
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->