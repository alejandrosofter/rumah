<?php
$this->breadcrumbs=array(
	'Sesiones'=>array('index'),
	$model->idSesion=>array('view','id'=>$model->idSesion),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sesiones', 'url'=>array('index')),
	array('label'=>'Create Sesiones', 'url'=>array('create')),
	array('label'=>'View Sesiones', 'url'=>array('view', 'id'=>$model->idSesion)),
	array('label'=>'Manage Sesiones', 'url'=>array('admin')),
);
?>

<h1>Update Sesiones <?php echo $model->idSesion; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>