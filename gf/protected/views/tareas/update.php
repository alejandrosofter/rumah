<?php
$this->breadcrumbs=array(
	'Tareases'=>array('index'),
	$model->idTarea=>array('view','id'=>$model->idTarea),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tareas', 'url'=>array('index')),
	array('label'=>'Create Tareas', 'url'=>array('create')),
	array('label'=>'View Tareas', 'url'=>array('view', 'id'=>$model->idTarea)),
	array('label'=>'Manage Tareas', 'url'=>array('admin')),
);
?>

<h1>Update Tareas <?php echo $model->idTarea; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>