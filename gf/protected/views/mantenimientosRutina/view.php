<?php
$this->breadcrumbs=array(
	'Mantenimientos Rutinas'=>array('index'),
	$model->idMantenimientoRutina,
);

$this->menu=array(
	array('label'=>'List MantenimientosRutina', 'url'=>array('index')),
	array('label'=>'Create MantenimientosRutina', 'url'=>array('create')),
	array('label'=>'Update MantenimientosRutina', 'url'=>array('update', 'id'=>$model->idMantenimientoRutina)),
	array('label'=>'Delete MantenimientosRutina', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idMantenimientoRutina),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MantenimientosRutina', 'url'=>array('admin')),
);
?>

<h1>View MantenimientosRutina #<?php echo $model->idMantenimientoRutina; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idMantenimientoRutina',
		'idMantenimientoEmpresa',
		'idRutina',
		'comentario',
	),
)); ?>
