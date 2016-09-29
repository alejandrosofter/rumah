<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Tipo turnos'=>array('admin'),
	$model->idTipoTurno,
);

$this->menu=array(
	array('label'=>'Agregar tipo turnos', 'url'=>array('create')),
	array('label'=>'Actualizar tipo turnos', 'url'=>array('update', 'id'=>$model->idTipoTurno)),
	array('label'=>'Eliminar tipo turnos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idTipoTurno),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Volver a tipo turnos', 'url'=>array('admin')),
);
?>

<h1>Ver tipo turnos #<?php echo $model->idTipoTurno; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idTipoTurno',
		'nombreTurno',
	),
)); ?>
