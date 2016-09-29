<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ordenes-cobro-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaOrdenCobro'); ?>
			<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name'=>'OrdenesCobro[fechaOrdenCobro]',
    'value'=>$model->fechaOrdenCobro,
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
        'dateFormat' => 'yy-mm-dd',
    ),
    'htmlOptions'=>array(
    	
        'style'=>'height:20px;'
    ),
)); ?>
		<?php echo $form->error($model,'fechaOrdenCobro'); ?>
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
     $('#OrdenesCobro_idCliente').val(ui.item.idCliente);" .
		 " $('#OrdenesCobro_tipoFactura').val(ui.item.letraHabitual);" .
     		"$('#buscador').val('');
    return false;
  }",
),
'htmlOptions'=>array('rows'=>50,'size'=>40,"placeholder"=>"Escriba el nombre del cliente"),

));
?>
<?php echo $form->dropDownList($model,'idCliente',CHtml::listData(Clientes::model()->consultarNombre(), 'idCliente', 'cliente','tipoCliente'),
		array ('prompt'=>'Seleccione el Cliente...',
		 'onchange'=>"js:function(event, ui) { " .
		 " $('#FacturasSalientes_tipoFactura').val(ui.item.letraHabitual);" .
     		"$('#buscador').val('');
    return false;
  }"));?>
		<?php echo $form->error($model,'idCliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'importeAcuenta'); ?>
		<?php echo $form->textField($model,'importeAcuenta'); ?>
		<?php echo $form->error($model,'importeAcuenta'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->