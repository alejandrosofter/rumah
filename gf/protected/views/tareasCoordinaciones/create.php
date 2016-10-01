<?php
$this->breadcrumbs=array(
	'Tareas Coordinaciones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TareasCoordinaciones', 'url'=>array('index')),
	array('label'=>'Manage TareasCoordinaciones', 'url'=>array('admin')),
);
?>

<h1>Create TareasCoordinaciones</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>