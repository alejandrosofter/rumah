<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Modelos de empleado'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Agregar modelo de empleado', 'url'=>array('create')),
	array('label'=>'Actualizar modelos empleados', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar modelo empleado', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Volver a modelo empleados', 'url'=>array('admin')),
);
?>

<h1>Ver modelos de empleados #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'idCategoria',
		'diaInicio',
		'diaFin',
		'nroDiaInicio',
		'nroDiaFin',
	),
)); ?>
