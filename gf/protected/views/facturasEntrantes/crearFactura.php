<?php

$this->breadcrumbs=array(
	'Centro de Compras'=>array('/facturasEntrantes/facturas'),'Facturas de Compra'
);

$this->menu=array(

	array('label'=>'Nueva Factura de Compra', 'url'=>array('create')),
	
	//array('label'=>'Dialogo', 'url'=>array('/stockPreciosItems/create'), 
	//'linkOptions'=>array('onclick'=>'$("#mydialog").dialog("open"); return false;')),
);
?><h1>Asistente para Nueva Factura</h1>
Puede realizar una carga de una factura a partir de <b>PRODUCTOS </b> (estos productos van a ser subidos a el stock de la empresa)
 o bien de <b>CONCEPTOS </b>( son insumos, mercaderia fuera de stock).
 <br><br>
 <div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(

)); ?>
<?php echo $form->errorSummary($model); ?>
<?php echo $form->textField($model,'numeroFactura',array('TYPE'=>'hidden')); ?>
<?php echo $form->textField($model,'tipoFactura',array('TYPE'=>'hidden')); ?>
<div class="row">
<span class='help-block'>1.- Esta fecha es la que se usa para deducir los vencimientos (en caso de que tenga)</span><br>
		<?php echo $form->labelEx($model,'fecha'); ?>

		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fecha'))?>

</div>

	<div class="row">
		<span class='help-block'>2.- Seleccion del Proveedor </span>	
		<?php echo $form->labelEx($model,'idProveedor'); ?>
		<?php $this->renderPartial('/proveedores/buscadorProveedores',array('model'=>$model,'campo'=>'idProveedor','nombreModelo'=>'FacturasEntrantes'))?>
		
	</div>
	
	<div class="row">	
		<span class='help-block'>3.- La condicion de compra define los pagos. </span>
		<?php echo $form->labelEx($model,'idCondicionCompra'); ?>
		<?php $this->renderPartial('/condicionesCompra/buscadorCondicionesCompra',array('model'=>$model,'campo'=>'idCondicionCompra','nombreModelo'=>'FacturasEntrantes'))?>
		
	</div>
	
	<div class="row">	
		<span class='help-block'>4.- Define si va a comprar STOCK o bien productos fuera de STOCK. </span>
		<?php echo $form->labelEx($model,'condicion'); ?>
		<?php echo  $form->dropDownList($model,'condicion',FacturasEntrantes::model()->getCondicion(),array ('prompt'=>'Seleccione...'));?>
		
	</div>


	<div class="actions">
		<?php echo CHtml::submitButton('Siguiente',array('class'=>'btn primary')); ?>
		<?php echo CHtml::submitButton('Reset',array('class'=>'btn ')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->