<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'facturas-ordenes-trabajo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idFacturaSaliente'); ?>
		<?php echo $form->dropDownList($model,'idFacturaSaliente',CHtml::listData(FacturasSalientes::model()->consultarFacturasOrden($model->idOrdenTrabajo), 'idFacturaSaliente', 'nombreFactura'),array ('prompt'=>'Seleccione la factura...'));?>
		<?php echo $form->error($model,'idFacturaSaliente'); ?>
	</div>

		<?php echo $form->textField($model,'idOrdenTrabajo',array('TYPE'=>'hidden')); ?>


		<?php echo $form->textField($model,'fecha',array('TYPE'=>'hidden')); ?>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->