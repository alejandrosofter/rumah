<?php
$this->breadcrumbs=array(
	'Recursos Ordenes Trabajos'=>array('index'),
	$model->idOrdenTrabajoRecurso,
);

$this->menu=array(
	array('label'=>'List RecursosOrdenesTrabajo', 'url'=>array('index')),
	array('label'=>'Create RecursosOrdenesTrabajo', 'url'=>array('create')),
	array('label'=>'Update RecursosOrdenesTrabajo', 'url'=>array('update', 'id'=>$model->idOrdenTrabajoRecurso)),
	array('label'=>'Delete RecursosOrdenesTrabajo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idOrdenTrabajoRecurso),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RecursosOrdenesTrabajo', 'url'=>array('admin')),
);
?>

<h1>View RecursosOrdenesTrabajo #<?php echo $model->idOrdenTrabajoRecurso; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idOrdenTrabajoRecurso',
		'idTipoRecurso',
		'nombre',
		'descripcion',
	),
)); ?>
