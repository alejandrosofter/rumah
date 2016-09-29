<?php
$this->breadcrumbs=array(
	'Ordenes Trabajo Coordinaciones'=>array('index'),
	$model->idOrdenesCoordinaciones,
);

$this->menu=array(
	array('label'=>'List OrdenesTrabajoCoordinaciones', 'url'=>array('index')),
	array('label'=>'Create OrdenesTrabajoCoordinaciones', 'url'=>array('create')),
	array('label'=>'Update OrdenesTrabajoCoordinaciones', 'url'=>array('update', 'id'=>$model->idOrdenesCoordinaciones)),
	array('label'=>'Delete OrdenesTrabajoCoordinaciones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idOrdenesCoordinaciones),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrdenesTrabajoCoordinaciones', 'url'=>array('admin')),
);
?>

<h1>View OrdenesTrabajoCoordinaciones #<?php echo $model->idOrdenesCoordinaciones; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idOrdenesCoordinaciones',
		'idOrdenes',
		'idEvento',
		'idCalendario',
		'comentario',
	),
)); ?>
