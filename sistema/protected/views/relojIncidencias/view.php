<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Incidencias'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Crear Incidencias', 'url'=>array('create')),
	array('label'=>'Actualizar Incidencias', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Incidencias', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro de querer eliminar este elemento?')),
	array('label'=>'Volver a Incidencias', 'url'=>array('admin')),
);
?>

<h1>Ver incidencias #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'idEmpleado',
		'fechaInicio',
		'fechaFin',
		'idMotivos',
	),
)); ?>
