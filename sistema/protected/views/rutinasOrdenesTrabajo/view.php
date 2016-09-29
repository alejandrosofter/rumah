<?php
$this->breadcrumbs=array(
	'Rutinas Ordenes Trabajos'=>array('index'),
	$model->idOrdenTrabajoRutina,
);

$this->menu=array(
	array('label'=>'List RutinasOrdenesTrabajo', 'url'=>array('index')),
	array('label'=>'Create RutinasOrdenesTrabajo', 'url'=>array('create')),
	array('label'=>'Update RutinasOrdenesTrabajo', 'url'=>array('update', 'id'=>$model->idOrdenTrabajoRutina)),
	array('label'=>'Delete RutinasOrdenesTrabajo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idOrdenTrabajoRutina),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RutinasOrdenesTrabajo', 'url'=>array('admin')),
);
?>

<h1>View RutinasOrdenesTrabajo #<?php echo $model->idOrdenTrabajoRutina; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idOrdenTrabajoRutina',
		'nombreRutina',
		'esFacturable',
		'esContratada',
		'duracionDias',
		'prioridad',
		'descripcionCliente',
		'descripcionEncargado',
	),
)); ?>
