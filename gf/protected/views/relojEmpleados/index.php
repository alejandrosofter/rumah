<?php
$this->breadcrumbs=array(
	'Reloj Empleados'=>array('index'),
	'Administrador',
);

$this->menu=array(
	array('label'=>'Nuevo empleado', 'url'=>array('create')),
	array('label'=>'Prueba', 'url'=>array('Imprimir')),
);

?>

<h1>Empleados</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reloj-empleados-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idLegajo',
		'nombreEmpleado',
		'idCuil',
		'FechaNacimiento',
		'domicilio',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
