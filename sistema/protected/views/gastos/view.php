<?php
$this->breadcrumbs=array(
	'Pagos'=>array('index'),
	$model->idGasto,
);

$this->menu=array(
	array('label'=>'Listar Gastos', 'url'=>array('index')),
	array('label'=>'Crear Gasto', 'url'=>array('create')),
	array('label'=>'Actualizar Gasto', 'url'=>array('update', 'id'=>$model->idGasto)),
	array('label'=>'Listar Asignaciones de Factura', 'url'=>array('/gastosFactura')),
	array('label'=>'Ver Pago'),
	array('label'=>'Quitar Gasto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idGasto),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Ver Pago #<?php echo $model->idGasto; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(

		'idProveedor',
		'fecha',
		'detalle',
		'importe',
		'formaPago',
		'idCuentaEfectivo',
	),
)); ?>
