<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Tarjetas empleados'=>array('admin'),
	$model->idEmpleadoTarjeta,
);

$this->menu=array(
	array('label'=>'Crear tarjetas empleados', 'url'=>array('create')),
	array('label'=>'Actualizar tarjetas empleados', 'url'=>array('update', 'id'=>$model->idEmpleadoTarjeta)),
	array('label'=>'Eliminar tarjetas empleados', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idEmpleadoTarjeta),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar tarjetas empleados', 'url'=>array('admin')),
);
?>

<h1>Ver tarjetas empleados #<?php echo $model->idEmpleadoTarjeta; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idEmpleadoTarjeta',
		'idEmpleado',
		'idTarjeta',
		'fechaTarjeta',
	),
)); ?>
