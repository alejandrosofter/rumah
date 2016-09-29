<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Turnos'=>array('admin'),
	$model->idTurno,
);

$this->menu=array(
	array('label'=>'Agregar turnos', 'url'=>array('create')),
	array('label'=>'Actualizar turnos', 'url'=>array('update', 'id'=>$model->idTurno)),
	array('label'=>'Eliminar turnos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idTurno),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Volver a turnos', 'url'=>array('admin')),
);
?>

<h1>Ver turnos reloj #<?php echo $model->idTurno; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idTurno',
		'idTipoTurno',
		'ingresoInicio',
		'salidaInicio',
		'ingresoRegreso',
		'salidaRegreso',
		'semana',
		'diaNombre',
		'horas',
		'horas50',
		'horas100',
		'horas50Noct',
		'horas100Noct',
		'idCategoria',
	),
)); ?>
