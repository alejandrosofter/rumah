<?php
$this->breadcrumbs=array(
	'Pedidoses'=>array('index'),
	$model->idPedido,
);

$this->menu=array(
	array('label'=>'List Pedidos', 'url'=>array('index')),
	array('label'=>'Create Pedidos', 'url'=>array('create')),
	array('label'=>'Update Pedidos', 'url'=>array('update', 'id'=>$model->idPedido)),
	array('label'=>'Delete Pedidos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idPedido),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pedidos', 'url'=>array('admin')),
);
?>

<h1>View Pedidos #<?php echo $model->idPedido; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idPedido',
		'idFacturaSaliente',
		'fechaPedido',
		'comentarioPedido',
		'datos',
	),
)); ?>
