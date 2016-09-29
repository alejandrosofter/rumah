<?php
$this->breadcrumbs=array(
	'Ordenes Pagos'=>array('index'),
	$model->idOrdenPago,
);

$this->menu=array(
	array('label'=>'List OrdenesPago', 'url'=>array('index')),
	array('label'=>'Create OrdenesPago', 'url'=>array('create')),
	array('label'=>'Update OrdenesPago', 'url'=>array('update', 'id'=>$model->idOrdenPago)),
	array('label'=>'Delete OrdenesPago', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idOrdenPago),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrdenesPago', 'url'=>array('admin')),
);
?>

<h1>View OrdenesPago #<?php echo $model->idOrdenPago; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idOrdenPago',
		'fechaOrden',
		'idProveedor',
		'estado',
		'pagoAcuenta',
	),
)); ?>
