<?php
$this->breadcrumbs=array(
	'Tareas Coordinaciones'=>array('index'),
	$model->idTareasCoordinaciones,
);

$this->menu=array(
	array('label'=>'List TareasCoordinaciones', 'url'=>array('index')),
	array('label'=>'Create TareasCoordinaciones', 'url'=>array('create')),
	array('label'=>'Update TareasCoordinaciones', 'url'=>array('update', 'id'=>$model->idTareasCoordinaciones)),
	array('label'=>'Delete TareasCoordinaciones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idTareasCoordinaciones),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TareasCoordinaciones', 'url'=>array('admin')),
);
?>

<h1>View TareasCoordinaciones #<?php echo $model->idTareasCoordinaciones; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idTareasCoordinaciones',
		'idTarea',
		'idEvento',
		'idCalendario',
		'comentario',
	),
)); ?>
