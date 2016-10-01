<?php
$this->breadcrumbs=array(
	'Presupuestos'=>array('index'),
	$model->idPresupuesto=>array('view','id'=>$model->idPresupuesto),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Lisar Presupuestos', 'url'=>array('index')),
	array('label'=>'Nuevo Presupuestos', 'url'=>array('create')),
);
?>

<h1>Actualizar Presupuesto <?php echo $model->idPresupuesto; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>