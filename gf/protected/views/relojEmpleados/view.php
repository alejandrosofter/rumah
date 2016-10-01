<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Empleados'=>array('admin'),
	$model->idEmpleado,
);

$this->menu=array(
	array('label'=>'Crear empleados', 'url'=>array('create')),
	array('label'=>'Actualizar empleados', 'url'=>array('update', 'id'=>$model->idEmpleado)),
	array('label'=>'Eliminar empleados', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idEmpleado),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar empleados', 'url'=>array('admin')),
);
?>

<h1>Ver empleados #<?php echo $model->idEmpleado; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idEmpleado',
		'idLegajo',
		'nombreEmpleado',
		'idCuil',
		'FechaNacimiento',
		'domicilio',
		'telefono',
		'fechaIngreso',
		'regl',
		'notifEmergencia',
		'suaf',
		'afectacion',
		'presentacion',
		'obrasocial',
		'altaFirmada',
		'preocup',
		'copiaDNI',
		'cuil',
		'idsucursal',
		'dni',
		'idCategoria',
	),
)); ?>
