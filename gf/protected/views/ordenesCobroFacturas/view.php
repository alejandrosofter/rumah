<?php
$this->breadcrumbs=array(
	'Ordenes Cobro Facturas'=>array('index'),
	$model->idOrdenCobroFacturas,
);

$this->menu=array(
	array('label'=>'Listar Ordenes de Cobro Facturas', 'url'=>array('index')),
	array('label'=>'Crear Orden de Cobro Factura', 'url'=>array('create')),
	array('label'=>'Actualizar Orden Cobro de Factura', 'url'=>array('update', 'id'=>$model->idOrdenCobroFacturas)),
	array('label'=>'Eliminar Orden Cobro Factura', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idOrdenCobroFacturas),'confirm'=>'Esta seguro de querer eliminar la orden?')),
);
?>

<h1>Ver Orden de Cobro Factura #<?php echo $model->idOrdenCobroFacturas; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idOrdenCobroFacturas',
		'idOrdenCobro',
		'idFacturaSaliente',
		'idFacturaVencimiento',
		'importeCobroFactura',
	),
)); ?>
