<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'facturas-salientes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
<?php echo $form->textField($model,'esCorriente',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
<?php echo $form->textField($model,'idOrdenTrabajo',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
<?php echo $form->textField($model,'idFacturaSalienteCte',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>

<table style="width=100%">
<td style="vertical-align: top;">
	<div class="row">
	
		<?php echo $form->labelEx($model,'idCliente'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'id'=>'buscador',
    'name'=>'buscador',
    'sourceUrl'=>$this->createUrl('clientes/etiquetas',array()),
    'options'=>array('width'=>250,
    'showAnim'=>'fold',

  'select'=>"js:function(event, ui) {
     $('#FacturasSalientes_idCliente').val(ui.item.idCliente);" .
		 " $('#FacturasSalientes_tipoFactura').val(ui.item.letraHabitual);" .
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
		<?php echo $form->labelEx($model,'numeroFactura'); ?>
		<?php echo $form->textField($model,'tipoFactura',array('style'=>"text-transform: uppercase;",'onBlur'=>'this.value = this.value.toUpperCase(); ','size'=>1,'maxlength'=>1)); ?>
		<?php $form->widget('CMaskedTextField',array(
        'model'=>$model,
        'attribute'=>'numeroFactura',
        'mask'=>'9999 - 99999999',
      ));?>
		
		<?php echo $form->error($model,'numeroFactura'); ?>
	</div>
	
</td>
<td>



<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name'=>'FacturasSalientes[fecha]',
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
		<?php echo $form->labelEx($model,'bonificacion'); ?>
		<?php echo $form->textField($model,'bonificacion',array('size'=>3,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'bonificacion'); ?>
	</div>
	<div class="row">
	
		<?php echo $form->labelEx($model,'idCondicionVenta'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'model'=>$model,
    'attribute'=>'idCondicionVenta',
  
//    'sourceUrl'=>$this->createUrl('condicionesCompra/etiquetas',array('real'=>'')),
'sourceUrl'=>$this->createUrl('condicionesVenta/etiquetas',array('real'=>'')),
    'options'=>array('width'=>250,
    'showAnim'=>'fold',

  'select'=>"js:function(event, ui) {
".
    "$('#FacturasSalientes_idCondicionVenta').val(ui.item.idCondicionVenta);".
    //"$('#FacturasEntrantes_buscadorCompra').val(ui.item.idCondicionCompra);".

   "
    return false;
  }",
),
'htmlOptions'=>array('rows'=>50,'size'=>10),

));
?>
		<?php echo $form->error($model,'idCondicionVenta'); ?>
	</div>
	
</td>
</table>

<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar'); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->