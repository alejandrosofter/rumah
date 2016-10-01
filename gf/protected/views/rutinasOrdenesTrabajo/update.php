<?php
$this->breadcrumbs=array(
	'Rutinas Ordenes Trabajos'=>array('index'),
	$model->idOrdenTrabajoRutina=>array('view','id'=>$model->idOrdenTrabajoRutina),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Volver a Rutinas', 'url'=>array('/rutinasOrdenesTrabajo')),
);
?>

<h1>Actualizar <?php echo $model->idOrdenTrabajoRutina; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>