<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pagos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name'=>'Pagos[fecha]',
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
		<?php echo $form->labelEx($model,'idCliente'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'id'=>'buscador',
    'name'=>'buscador',
    'sourceUrl'=>$this->createUrl('clientes/etiquetas',array()),
    'options'=>array('width'=>250,
    'showAnim'=>'fold',

  'select'=>"js:function(event, ui) {
     $('#Pagos_idCliente').val(ui.item.idCliente);" .
     		"$('#buscador').val('');
    return false;
  }",
),
'htmlOptions'=>array('rows'=>50,'size'=>100,"placeholder"=>"Escriba el nombre del cliente"),

));
?>
		<?php echo $form->dropDownList($model,'idCliente',CHtml::listData(Clientes::model()->consultarNombre(), 'idCliente', 'cliente','tipoCliente'),array ('prompt'=>'Seleccione el Cliente...'));?>
		<?php echo $form->error($model,'idCliente'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'idCuentaVenta'); ?>
		<?php echo  $form->dropDownList($model,'idCuentaVenta',CHtml::listData(CuentasVenta::model()->findAll(), 'idCuentaVenta', 'nombre'),array ('prompt'=>'Seleccione una Cuenta Contable...'));?>
		<?php echo $form->error($model,'idCuentaVenta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'importeDinero'); ?>
		<?php echo $form->textField($model,'importeDinero'); ?>
		<?php echo $form->error($model,'importeDinero'); ?>
	</div>

	
	
	<div class="row">
		<?php echo $form->labelEx($model,'detalle'); ?>
		<?php echo $form->textArea($model,'detalle',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'detalle'); ?>
	</div>
<div class="row">
		<?php echo $form->labelEx($model,'formaPago'); ?>
		<?php echo  $form->dropDownList($model,'formaPago',$model->getFormasPago(),array ('prompt'=>'Seleccione una forma de pago...'));?>
		<?php echo $form->error($model,'formaPago'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'idCuentaEfectivo'); ?>
		<?php echo  $form->dropDownList($model,'idCuentaEfectivo',CHtml::listData(CuentasEfectivo::model()->findAll(), 'idCuentaEfectivo', 'nombre'),array ('prompt'=>'Seleccione una cuenta...'));?>
		<?php echo $form->error($model,'idCuentaEfectivo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->