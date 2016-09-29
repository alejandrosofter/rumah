<?php
$this->breadcrumbs=array(
	'Centro de Tareas',
);
$this->menu=array(

	array('label'=>'Nueva Tarea','url'=>array('/tareas/create')),
	array('label'=>'Nuevo Mantenimiento','url'=>array('/mantenimientosEmpresas/create')),
);
?>
<h1>CENTRO DE TAREAS</h1>
<?PHP

$cadena= Yii::app()->settings->getKey('INICIO_TAREAS');
echo $cadena;
?>

