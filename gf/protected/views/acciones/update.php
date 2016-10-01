<?php
$this->breadcrumbs=array(
	'Acciones'=>array('index'),
	$model->idAccion=>array('view','id'=>$model->idAccion),
	'Update',
);

$this->menu=array(
	array('label'=>'List Acciones', 'url'=>array('index')),
	array('label'=>'Create Acciones', 'url'=>array('create')),
	array('label'=>'View Acciones', 'url'=>array('view', 'id'=>$model->idAccion)),
	array('label'=>'Manage Acciones', 'url'=>array('admin')),
);
?>

<h1>Update Acciones <?php echo $model->idAccion; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>