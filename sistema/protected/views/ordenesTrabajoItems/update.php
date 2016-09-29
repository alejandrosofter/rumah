<?php
$this->breadcrumbs=array(
	'Ordenes Trabajo Items'=>array('index'),
	$model->idOrdenTrabajoItem=>array('view','id'=>$model->idOrdenTrabajoItem),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrdenesTrabajoItems', 'url'=>array('index')),
	array('label'=>'Create OrdenesTrabajoItems', 'url'=>array('create')),
	array('label'=>'View OrdenesTrabajoItems', 'url'=>array('view', 'id'=>$model->idOrdenTrabajoItem)),
	array('label'=>'Manage OrdenesTrabajoItems', 'url'=>array('admin')),
);
?>

<h1>Update OrdenesTrabajoItems <?php echo $model->idOrdenTrabajoItem; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>