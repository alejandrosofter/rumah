<?php
$this->breadcrumbs=array(
	'Condiciones Compras'=>array('index'),
	$model->idCondicionCompra,
);

$this->menu=array(
	array('label'=>'List CondicionesCompra', 'url'=>array('index')),
	array('label'=>'Create CondicionesCompra', 'url'=>array('create')),
	array('label'=>'Update CondicionesCompra', 'url'=>array('update', 'id'=>$model->idCondicionCompra)),
	array('label'=>'Delete CondicionesCompra', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idCondicionCompra),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CondicionesCompra', 'url'=>array('admin')),
);
?>

<h1>View CondicionesCompra #<?php echo $model->idCondicionCompra; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idCondicionCompra',
		'descripcion',
		'generaFacturaCredito',
	),
)); ?>
