<?php
$this->breadcrumbs=array(
	'Items Pedidos'=>array('index'),
	$model->idItemPedido,
);

$this->menu=array(
	array('label'=>'List ItemsPedido', 'url'=>array('index')),
	array('label'=>'Create ItemsPedido', 'url'=>array('create')),
	array('label'=>'Update ItemsPedido', 'url'=>array('update', 'id'=>$model->idItemPedido)),
	array('label'=>'Delete ItemsPedido', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idItemPedido),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ItemsPedido', 'url'=>array('admin')),
);
?>

<h1>View ItemsPedido #<?php echo $model->idItemPedido; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idItemPedido',
		'nombreItem',
		'precioCompra',
		'precioVenta',
		'porecentajeIva',
		'idStock',
		'idPedido',
		'cantidad',
	),
)); ?>
