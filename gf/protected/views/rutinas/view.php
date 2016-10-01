<?php
$this->breadcrumbs=array(
	'Rutinas'=>array('index'),
	$model->idRutina,
);

$this->menu=array(
	array('label'=>'Listar Rutinas', 'url'=>array('verIndividual&idMantenimientoEmpresa='.$idMantenimientoEmpresa)),
	array('label'=>'Crear Rutinas', 'url'=>array('create&idMantenimientoEmpresa='.$idMantenimientoEmpresa)),
	array('label'=>'Actualizar Rutinas', 'url'=>array('update&id='.$model->idRutina.'&idMantenimientoEmpresa='.$idMantenimientoEmpresa)),
	array('label'=>'Eliminar Rutinas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idRutina),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Rutinas', 'url'=>array('admin')),
);
?>

<h1>Ver Rutinas #<?php echo $model->idRutina; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idRutina',
		'semana',
		'nombreDia',
		'idDia',
		'hora',
		'divisorSemana',
		'horaIngreso',
		'horaSalida',
		'comentarioRutina',
	),
)); ?>
