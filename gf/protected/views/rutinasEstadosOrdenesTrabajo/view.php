<?php
$this->breadcrumbs=array(
	'Rutinas Estados Ordenes Trabajos'=>array('index'),
	$model->idOrdenTrabajoRutinaEstado,
);

$this->menu=array(
	array('label'=>'List RutinasEstadosOrdenesTrabajo', 'url'=>array('index')),
	array('label'=>'Create RutinasEstadosOrdenesTrabajo', 'url'=>array('create')),
	array('label'=>'Update RutinasEstadosOrdenesTrabajo', 'url'=>array('update', 'id'=>$model->idOrdenTrabajoRutinaEstado)),
	array('label'=>'Delete RutinasEstadosOrdenesTrabajo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idOrdenTrabajoRutinaEstado),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RutinasEstadosOrdenesTrabajo', 'url'=>array('admin')),
);
?>

<h1>View RutinasEstadosOrdenesTrabajo #<?php echo $model->idOrdenTrabajoRutinaEstado; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idOrdenTrabajoRutinaEstado',
		'idRutina',
		'dias',
		'estado',
		'detalle',
		'nroEstado',
		'costoTiempo',
	),
)); ?>
