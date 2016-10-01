<?php
$this->breadcrumbs=array(
	'Cron a Usuario'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Tareas Programadas', 'url'=>array('index')),
);
?>

<h1>Nuevo Cron a Usuario</h1>

<?php echo $this->renderPartial('_formUsuario', array('model'=>$model)); ?>