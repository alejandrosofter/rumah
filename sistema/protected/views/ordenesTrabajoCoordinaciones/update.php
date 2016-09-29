<?php
$this->breadcrumbs=array(
	'Ordenes Trabajo Coordinaciones'=>array('index'),
	$model->idOrdenesCoordinaciones=>array('view','id'=>$model->idOrdenesCoordinaciones),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrdenesTrabajoCoordinaciones', 'url'=>array('index')),
	array('label'=>'Create OrdenesTrabajoCoordinaciones', 'url'=>array('create')),
	array('label'=>'View OrdenesTrabajoCoordinaciones', 'url'=>array('view', 'id'=>$model->idOrdenesCoordinaciones)),
	array('label'=>'Manage OrdenesTrabajoCoordinaciones', 'url'=>array('admin')),
);
?>

<h1>Update OrdenesTrabajoCoordinaciones <?php echo $model->idOrdenesCoordinaciones; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>