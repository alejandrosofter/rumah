<?php
$this->breadcrumbs=array(
	'Mantenimientos Rutinas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MantenimientosRutina', 'url'=>array('index')),
	array('label'=>'Manage MantenimientosRutina', 'url'=>array('admin')),
);
?>

<h1>Create MantenimientosRutina</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>