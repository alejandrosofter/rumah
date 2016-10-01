<?php
$this->breadcrumbs=array(
	'Centro de Ventas'=>array('/facturasSalientes/centroVentas'),'Saldo Cliente'
);

$this->menu=array(
	array('label'=>'Nueva Factura','url'=>array('/facturasSalientes/create')),
	array('label'=>'Nuevo Pago','url'=>array('/pagos/create')),
	array('label'=>'Libro IVA Ventas', 'url'=>array('/impresiones/librosiva')),
);
?>
<h1>SALDO DE CLIENTE</h1>
Por favor seleccione el cliente y el rango de fechas para sacar el saldo...
<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>false,'id'=>'Reporte-form',
'action'=>Yii::app()->createUrl('facturasSalientes/saldoClientes'),
	'method'=>'post',
)); ?>
<div class="form">
<p class="note">Por favor ingrese el rango de fechas a consultar:</p>
	<div class="row">
		<?php echo $form->labelEx($model,'Cliente'); ?>
		<?php $this->renderPartial('/clientes/buscadorClientes',array('nombreModelo'=>'Balances','form'=>$form, 'model'=>$model,'campo'=>'idCliente'))?>
<?php echo $form->error($model,'idCliente'); ?>
	</div>
	
<div class="row">
<?php echo $form->labelEx($model,'fechaInicio'); ?>
<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaInicio'))?>




</div>
<div class="row">
<?php echo $form->labelEx($model,'fechaFin'); ?>
<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaFin'))?>
</div>
<div class="actions">
<?php echo CHtml::submitButton('Reporte',array('class'=>'btn primary')); ?>
</div>
</div>
<?php $this->endWidget(); ?> 	