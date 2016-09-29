<?php
$this->breadcrumbs=array(
	'Mantenimientos Empresas'=>array('/mantenimientosEmpresas'),'Tareas'=>array('index'),
	$model->idTarea,
);

$this->menu=array(
	array('label'=>'Listar Tareas', 'url'=>array('index')),
	array('label'=>'Crear Tarea', 'url'=>array('create')),
	array('label'=>'Actualizar Tarea', 'url'=>array('update', 'id'=>$model->idTarea)),
	array('label'=>'Quitar Tarea', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idTarea),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Ver Tarea #<?php echo $model->idTarea; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(

		'fechaTarea',
		'prioridadTarea',
		'estadoTarea',
		'descripcionTarea',
		'tipoTarea',
		'idClienteTarea',
	),
)); ?>
