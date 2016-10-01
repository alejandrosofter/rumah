<?php
$this->breadcrumbs=array(
	'Centro de Tareas'=>array('/tareas/centroTareas'),
	'Asignación de Personal'
);

$this->menu=array(
	array('label'=>'Listar Destinatarios', 'url'=>array('index')),
	array('label'=>'Mis Tareas', 'url'=>array('/tareas/verMisTareas')),
);
?>

<h1>Asignar Personal</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'idTarea'=>$idTarea,'idCliente'=>$idCliente,'cliente'=>$cliente)); ?>