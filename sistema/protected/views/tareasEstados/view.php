<?php
$this->breadcrumbs=array(
	'Centro de Tareas'=>array('/tareas/centroTareas'),
	'Asentando estado'
);
$this->menu=array(
	array('label'=>'Mis Tareas', 'url'=>array('tareas/verMisTareas')),
	array('label'=>'Tareas de mi Area', 'url'=>array('tareas/tareasMiArea')),
	array('label'=>'Actualizar Estado', 'url'=>array('update', 'id'=>$model->idTareaEstado)),
	array('label'=>'Quitar Estado', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idTareaEstado),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Ver Estado #<?php echo $model->idTareaEstado; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idTareaEstado',
		'idTarea',
		'fechaEstadoTarea',
		'detalleEstadoTarea',
		'nombreEstado',
	),
)); ?>
