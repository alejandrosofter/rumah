<?php
$this->breadcrumbs=array(
	'Ordenes Trabajo Recursoses'=>array('index'),
	$model->idOrdenIdRecurso,
);

$this->menu=array(
	array('label'=>'List OrdenesTrabajoRecursos', 'url'=>array('index')),
	array('label'=>'Create OrdenesTrabajoRecursos', 'url'=>array('create')),
	array('label'=>'Update OrdenesTrabajoRecursos', 'url'=>array('update', 'id'=>$model->idOrdenIdRecurso)),
	array('label'=>'Delete OrdenesTrabajoRecursos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idOrdenIdRecurso),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrdenesTrabajoRecursos', 'url'=>array('admin')),
);
?>

<h1>View OrdenesTrabajoRecursos #<?php echo $model->idOrdenIdRecurso; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idOrdenIdRecurso',
		'idOrdenTrabajo',
		'idRecurso',
	),
)); ?>
