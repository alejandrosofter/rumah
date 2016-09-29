<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Hora dia empleados'=>array('admin'),
	$model->idHoraDiaEmpleado,
);

$this->menu=array(
	array('label'=>'Crear hora dia empleado', 'url'=>array('create')),
	array('label'=>'Actualizar hora dia empleado', 'url'=>array('update', 'id'=>$model->idHoraDiaEmpleado)),
	array('label'=>'Eliminar hora dia empleado', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idHoraDiaEmpleado),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar hora dia empleado', 'url'=>array('admin')),
);
?>

<h1>Ver hora dia empleado #<?php echo $model->idHoraDiaEmpleado; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idHoraDiaEmpleado',
		'idEmpleado',
		'fechaDia',
		'estadoFecha',
		'comentario',
		'entradaUno',
		'salidaUno',
		'entradaDos',
		'salidaDos',
		'entradaTres',
		'salidaTres',
		'modificacion',
	),
)); ?>
