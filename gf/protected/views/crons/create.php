<?php
$this->breadcrumbs=array(
	'Tarea Programada'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Tareas Programadas', 'url'=>array('index')),
);
?>

<h1>Crear Tarea Programada</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>