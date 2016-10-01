<?php
$this->breadcrumbs=array(
	'Rutinas Recursoses'=>array('index'),
	$model->idRutinaIdRecurso,
);

$this->menu=array(
	array('label'=>'List RutinasRecursos', 'url'=>array('index')),
	array('label'=>'Create RutinasRecursos', 'url'=>array('create')),
	array('label'=>'Update RutinasRecursos', 'url'=>array('update', 'id'=>$model->idRutinaIdRecurso)),
	array('label'=>'Delete RutinasRecursos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idRutinaIdRecurso),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RutinasRecursos', 'url'=>array('admin')),
);
?>

<h1>View RutinasRecursos #<?php echo $model->idRutinaIdRecurso; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idRutinaIdRecurso',
		'idRutina',
		'idRecurso',
	),
)); ?>
