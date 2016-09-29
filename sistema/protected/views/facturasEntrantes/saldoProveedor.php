<?php
$this->breadcrumbs=array(
	'Centro de Compras'=>array('/facturasEntrantes/centroCompras'),'Saldo Proveedor'
);

$this->menu=array(
	array('label'=>'Nueva Factura','url'=>array('/facturasEntrantes/create')),
	array('label'=>'Nuevo Pago','url'=>array('/gastos/create')),
	array('label'=>'Libro IVA Ventas', 'url'=>array('/impresiones/librosiva')),
);
?>
<h1>SALDO DE PROVEEDOR</h1>
Por favor seleccione el proveedor y el rango de fechas para sacar el saldo...
<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>false,'id'=>'Reporte-form',
'action'=>Yii::app()->createUrl('facturasEntrantes/saldoProveedor'),
	'method'=>'post',
)); ?>
<div class="form">
<p class="note">Por favor ingrese el rango de fechas a consultar:</p>
	<div class="row">
		<?php echo $form->labelEx($model,'Proveedor'); ?>
<?php $this->renderPartial('/proveedores/buscadorProveedores',array('form'=>$form,'model'=>$model,'campo'=>'idProveedor','nombreModelo'=>'Balances'))?>
	
	</div>
	
<div class="row">
<?php echo $form->labelEx($model,'fechaInicio'); ?>
	<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaInicio'));?>




</div>
<div class="row">
<?php echo $form->labelEx($model,'fechaFin'); ?>
<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaFin'));?>
</div>
<div class="row buttons">
<?php echo CHtml::submitButton('Reporte'); ?>
</div>
</div>
<?php $this->endWidget(); ?> 	