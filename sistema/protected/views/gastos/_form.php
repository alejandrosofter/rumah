<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gastos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name'=>'Gastos[fecha]',
   'value'=>$model->fecha,
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
        'dateFormat' => 'yy-mm-dd',
       
    ),
    'htmlOptions'=>array(
    	
        'style'=>'height:20px;'
    ),
)); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'idProveedor'); ?>
		<?php echo  $form->dropDownList($model,'idProveedor',CHtml::listData(Proveedores::model()->findAll(), 'idProveedor', 'nombre'),array ('prompt'=>'Seleccione el Proveedor...'));?>
		<?php echo $form->error($model,'idProveedor'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'idCuenta'); ?>
		<?php echo  $form->dropDownList($model,'idCuenta',CHtml::listData(Cuentas::model()->findAll(), 'idCuenta', 'nombre'),array ('prompt'=>'Seleccione una Cuenta Contable...'));?>
		<?php echo $form->error($model,'idCuenta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'detalle'); ?>
		<?php echo $form->textArea($model,'detalle',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'detalle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'importe'); ?>
		<?php echo $form->textField($model,'importe'); ?>
		<?php echo $form->error($model,'importe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'formaPago'); ?>
		<?php echo  $form->dropDownList($model,'formaPago',$model->getFormaPagos(),array ('prompt'=>'Seleccione una forma de Pago...'));?>
		<?php echo $form->error($model,'formaPago'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idCuentaEfectivo'); ?>
		<?php echo  $form->dropDownList($model,'idCuentaEfectivo',CHtml::listData(CuentasEfectivo::model()->findAll(), 'idCuentaEfectivo', 'nombre'),array ('prompt'=>'Seleccione un destino...'));?>
		<?php echo $form->error($model,'idCuentaEfectivo'); ?>
	</div>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->