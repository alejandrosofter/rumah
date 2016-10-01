<?php
$this->breadcrumbs=array(
	'Ordenes Trabajo Stocks'=>array('index'),
	$model->idStockOrden,
);

$this->menu=array(
	array('label'=>'List OrdenesTrabajoStock', 'url'=>array('index')),
	array('label'=>'Create OrdenesTrabajoStock', 'url'=>array('create')),
	array('label'=>'Update OrdenesTrabajoStock', 'url'=>array('update', 'id'=>$model->idStockOrden)),
	array('label'=>'Delete OrdenesTrabajoStock', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idStockOrden),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrdenesTrabajoStock', 'url'=>array('admin')),
);
?>

<h1>View OrdenesTrabajoStock #<?php echo $model->idStockOrden; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idStockOrden',
		'idStock',
		'idOrdenTrabajo',
		'nombreStock',
		'porcentajeIva',
		'importe',
		'cantidad',
	),
)); ?>
