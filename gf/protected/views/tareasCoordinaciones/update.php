<?php
$this->breadcrumbs=array(
	'Tareas Coordinaciones'=>array('index'),
	$model->idTareasCoordinaciones=>array('view','id'=>$model->idTareasCoordinaciones),
	'Update',
);

$this->menu=array(
	array('label'=>'List TareasCoordinaciones', 'url'=>array('index')),
	array('label'=>'Create TareasCoordinaciones', 'url'=>array('create')),
	array('label'=>'View TareasCoordinaciones', 'url'=>array('view', 'id'=>$model->idTareasCoordinaciones)),
	array('label'=>'Manage TareasCoordinaciones', 'url'=>array('admin')),
);
?>

<h1>Update TareasCoordinaciones <?php echo $model->idTareasCoordinaciones; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>