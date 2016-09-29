<?php
$this->breadcrumbs=array(
	'Stock Disponibles'=>array('index'),
	$model->idStockDisponible,
);

$this->menu=array(
	array('label'=>'List StockDisponible', 'url'=>array('index')),
	array('label'=>'Create StockDisponible', 'url'=>array('create')),
	array('label'=>'Update StockDisponible', 'url'=>array('update', 'id'=>$model->idStockDisponible)),
	array('label'=>'Delete StockDisponible', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idStockDisponible),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StockDisponible', 'url'=>array('admin')),
);
?>

<h1>View StockDisponible #<?php echo $model->idStockDisponible; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idStockDisponible',
		'idStock',
		'cantidadDisponible',
		'auxiliarStock',
		'auxiliarDisponible',
	),
)); ?>
