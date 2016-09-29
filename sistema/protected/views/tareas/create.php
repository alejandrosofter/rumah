<?php
$this->breadcrumbs=array(
	'Centro de Tareas'=>array('/tareas/centroTareas'),
	'Nueva Tarea'
);
$this->breadcrumbs=array(
	'Matenimientos Empresas'=>array('/mantenimientosEmpresas'),$cliente=>array('/tareas/cliente&idCliente='.$idCliente.'&cliente='.$cliente),'Nueva Tarea'
);


$this->menu=array(
	array('label'=>'Listar Tareas', 'url'=>array('index')),
	array('label'=>'Mis Tareas', 'url'=>array('verMisTareas')),
	array('label'=>'Nueva Tarea', ),
);
?>

<h1>Nueva Tarea</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>