<?php
$this->breadcrumbs=array(
	'Facturas Items'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FacturasItems', 'url'=>array('index')),
	array('label'=>'Create FacturasItems', 'url'=>array('create')),
	array('label'=>'Update FacturasItems', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FacturasItems', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FacturasItems', 'url'=>array('admin')),
);
?>

<h1>View FacturasItems #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'idFactura',
		'idProducto',
		'detalle',
		'importe',
		'cantidad',
		'total',
		'interes',
		'descuentos',
	),
)); ?>
