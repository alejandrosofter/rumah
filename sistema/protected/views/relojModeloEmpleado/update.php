<?php
$this->breadcrumbs=array(
	'Modelos de empleado'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Agregar modelo de empleado', 'url'=>array('create')),
	array('label'=>'Ver modelos empleado', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Volver a modelos empelados', 'url'=>array('admin')),
);
?>

<h1>Actualizar modelos empleados <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>