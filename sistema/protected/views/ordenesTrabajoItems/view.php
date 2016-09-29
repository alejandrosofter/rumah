<?php
$this->breadcrumbs=array(
	'Ordenes Trabajo Items'=>array('index'),
	$model->idOrdenTrabajoItem,
);

$this->menu=array(
	array('label'=>'List OrdenesTrabajoItems', 'url'=>array('index')),
	array('label'=>'Create OrdenesTrabajoItems', 'url'=>array('create')),
	array('label'=>'Update OrdenesTrabajoItems', 'url'=>array('update', 'id'=>$model->idOrdenTrabajoItem)),
	array('label'=>'Delete OrdenesTrabajoItems', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idOrdenTrabajoItem),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrdenesTrabajoItems', 'url'=>array('admin')),
);
?>

<h1>View OrdenesTrabajoItems #<?php echo $model->idOrdenTrabajoItem; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idOrdenTrabajoItem',
		'cantidad',
		'item',
		'importe',
		'porcentajeIva',
		'idStock',
		'estadoItem',
		'idOrdenTrabajo',
	),
)); ?>
