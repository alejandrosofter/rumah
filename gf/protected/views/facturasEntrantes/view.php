<?php
$this->breadcrumbs=array(
	'Centro de Compras'=>array('/facturasEntrantes/facturas'), 'Ver Factura'
);

$this->menu=array(
	array('label'=>'Facturas','url'=>array('/facturasEntrantes')),
	array('label'=>'Nueva Factura de Compra',  'url'=>array('create')),
	array('label'=>'Ver Factura de Compra'),
	array('label'=>'Actualizar Compra', 'url'=>array('update', 'id'=>$model->idFacturaEntrante)),
	array('label'=>'Quitar Compra', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idFacturaEntrante),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>Ver Compra #<?php echo $model->idFacturaEntrante; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idFacturaEntrante',
		'idProveedor',
		'fecha',
		'fechaVencimiento',
		'numeroFactura',
		'precio',
		'descripcion',
		'estado',
		'tipoFactura',
		'idCentroCosto',
		'iva21',
		'iva105',
	),
)); ?>
