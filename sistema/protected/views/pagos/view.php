<?php
$this->breadcrumbs=array(
	'Pagos'=>array('index'),
	'Pago Ingresado',
);

$this->menu=array(
array('label'=>'Facturas', 'url'=>array('/facturasSalientes')),
	array('label'=>'Listar Pagos', 'url'=>array('index')),
	
	array('label'=>'Nuevo Pago', 'url'=>array('create')),
	array('label'=>'Actualizar Pago', 'url'=>array('update', 'id'=>$model->idPago)),
	array('label'=>'Quitar Pago', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idPago),'confirm'=>'Are you sure you want to delete this item?')),

	
);
?>

<h1>Pago Ingresado</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idPago',
		'fecha',
		'detalle',
		'idCliente',
		'importeDinero',
		'formaPago',
		'idCuentaEfectivo',
	),
)); ?>
