<?php
$this->breadcrumbs=array(
	'Mantenimientos Rutinas'=>array('index'),
	$model->idMantenimientoRutina=>array('view','id'=>$model->idMantenimientoRutina),
	'Update',
);

$this->menu=array(
	array('label'=>'List MantenimientosRutina', 'url'=>array('index')),
	array('label'=>'Create MantenimientosRutina', 'url'=>array('create')),
	array('label'=>'View MantenimientosRutina', 'url'=>array('view', 'id'=>$model->idMantenimientoRutina)),
	array('label'=>'Manage MantenimientosRutina', 'url'=>array('admin')),
);
?>

<h1>Update MantenimientosRutina <?php echo $model->idMantenimientoRutina; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>