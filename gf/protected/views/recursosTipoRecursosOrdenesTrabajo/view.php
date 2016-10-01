<?php
$this->breadcrumbs=array(
	'Recursos Tipo Recursos Ordenes Trabajos'=>array('index'),
	$model->idOrdenTrabajoTipoRecurso,
);

$this->menu=array(
	array('label'=>'List RecursosTipoRecursosOrdenesTrabajo', 'url'=>array('index')),
	array('label'=>'Create RecursosTipoRecursosOrdenesTrabajo', 'url'=>array('create')),
	array('label'=>'Update RecursosTipoRecursosOrdenesTrabajo', 'url'=>array('update', 'id'=>$model->idOrdenTrabajoTipoRecurso)),
	array('label'=>'Delete RecursosTipoRecursosOrdenesTrabajo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idOrdenTrabajoTipoRecurso),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RecursosTipoRecursosOrdenesTrabajo', 'url'=>array('admin')),
);
?>

<h1>View RecursosTipoRecursosOrdenesTrabajo #<?php echo $model->idOrdenTrabajoTipoRecurso; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idOrdenTrabajoTipoRecurso',
		'nombreTipoRecurso',
	),
)); ?>
