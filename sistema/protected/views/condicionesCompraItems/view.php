<?php
$this->breadcrumbs=array(
	'Condiciones Compra Items'=>array('index'),
	$model->idCondicionCompraItem,
);

$this->menu=array(
	array('label'=>'List CondicionesCompraItems', 'url'=>array('index')),
	array('label'=>'Create CondicionesCompraItems', 'url'=>array('create')),
	array('label'=>'Update CondicionesCompraItems', 'url'=>array('update', 'id'=>$model->idCondicionCompraItem)),
	array('label'=>'Delete CondicionesCompraItems', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idCondicionCompraItem),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CondicionesCompraItems', 'url'=>array('admin')),
);
?>

<h1>View CondicionesCompraItems #<?php echo $model->idCondicionCompraItem; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idCondicionCompraItem',
		'idCondicionCompra',
		'porcentajeTotalFacturado',
		'cantidadCuotas',
		'aVencerEnDias',
		'cantidadDiasMeses',
		'unidadCantidad',
	),
)); ?>
