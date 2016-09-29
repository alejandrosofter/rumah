<?php
$this->breadcrumbs=array(
	'Acciones'=>array('index'),
	$model->idAccion,
);

$this->menu=array(
	array('label'=>'List Acciones', 'url'=>array('index')),
	array('label'=>'Create Acciones', 'url'=>array('create')),
	array('label'=>'Update Acciones', 'url'=>array('update', 'id'=>$model->idAccion)),
	array('label'=>'Delete Acciones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idAccion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Acciones', 'url'=>array('admin')),
);
?>

<h1>View Acciones #<?php echo $model->idAccion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idAccion',
		'nombre',
		'direccion',
		'tipo',
		'descripcion',
		'imagen',
	),
)); ?>
