<?php
$this->breadcrumbs=array(
	'Ordenes Trabajo Estadoses'=>array('index'),
	$model->idEstadoOrden=>array('view','id'=>$model->idEstadoOrden),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrdenesTrabajoEstados', 'url'=>array('index')),
	array('label'=>'Create OrdenesTrabajoEstados', 'url'=>array('create')),
	array('label'=>'View OrdenesTrabajoEstados', 'url'=>array('view', 'id'=>$model->idEstadoOrden)),
	array('label'=>'Manage OrdenesTrabajoEstados', 'url'=>array('admin')),
);
?>

<h1>Update OrdenesTrabajoEstados <?php echo $model->idEstadoOrden; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>