<?php
$this->breadcrumbs=array(
	'Compras Items'=>array('index'),
	$model->idCompraItem,
);

$this->menu=array(
	array('label'=>'List ComprasItems', 'url'=>array('index')),
	array('label'=>'Create ComprasItems', 'url'=>array('create')),
	array('label'=>'Update ComprasItems', 'url'=>array('update', 'id'=>$model->idCompraItem)),
	array('label'=>'Delete ComprasItems', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idCompraItem),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ComprasItems', 'url'=>array('admin')),
);
?>

<h1>View ComprasItems #<?php echo $model->idCompraItem; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idCompraItem',
		'idCompra',
		'idStock',
		'cantidad',
		'alicuotaIva',
	),
)); ?>
