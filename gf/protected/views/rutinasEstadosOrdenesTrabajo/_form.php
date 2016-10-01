<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rutinas-estados-ordenes-trabajo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>


		<?php echo $form->textField($model,'idRutina',array('TYPE'=>'hidden')); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'dias'); ?>
		<?php echo $form->textField($model,'dias',array('class'=>'span1')); ?>
		<?php echo $form->error($model,'dias'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'detalle'); ?>
		<?php echo $form->textArea($model,'detalle',array('class'=>'span7','rows'=>3)); ?>
		<?php echo $form->error($model,'detalle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->dropDownList($model,'estado',OrdenesTrabajo::model()->getEstados(),array ('prompt'=>'Seleccione un Estado...'));?>

		<?php echo $form->error($model,'estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enviaMail'); ?>
		<?php echo $form->checkBox($model,'enviaMail'); ?>
		<?php echo $form->error($model,'enviaMail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nroEstado'); ?>
		<?php echo $form->textField($model,'nroEstado',array('class'=>'span1')); ?>
		<?php echo $form->error($model,'nroEstado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'costoTiempo'); ?>
		<?php echo $form->textField($model,'costoTiempo',array('class'=>'span1')); ?>
		<?php echo $form->error($model,'costoTiempo'); ?>
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->