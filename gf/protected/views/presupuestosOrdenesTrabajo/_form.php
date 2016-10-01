<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'presupuestos-ordenes-trabajo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textField($model,'idPresupuesto',array('TYPE'=>'hidden')); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'idOrdenTrabajo'); ?>
		<?php echo $form->dropDownList($model,'idOrdenTrabajo',CHtml::listData(OrdenesTrabajo::model()->consultarOrdenes($model->idPresupuesto), 'idOrdenTrabajo', 'nombre'),array ('prompt'=>'Seleccione la orden...'));?>
		<?php echo $form->error($model,'idOrdenTrabajo'); ?>
	</div>

		<?php echo $form->textField($model,'fecha',array('TYPE'=>'hidden')); ?>


	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->