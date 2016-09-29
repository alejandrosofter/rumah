<?php
$this->breadcrumbs=array(
	'Sesiones'=>array('index'),
	$model->idSesion,
);

$this->menu=array(
	array('label'=>'List Sesiones', 'url'=>array('index')),
	array('label'=>'Create Sesiones', 'url'=>array('create')),
	array('label'=>'Update Sesiones', 'url'=>array('update', 'id'=>$model->idSesion)),
	array('label'=>'Delete Sesiones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idSesion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sesiones', 'url'=>array('admin')),
);
?>

<h1>View Sesiones #<?php echo $model->idSesion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idSesion',
		'idUsuario',
		'fechaIngresa',
		'fechaEgresa',
	),
)); ?>
