<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Horas empleados'=>array('admin'),
	$model->idHora,
);

$this->menu=array(
	array('label'=>'Crear horas empleados', 'url'=>array('create')),
	array('label'=>'Actualizar horas empleados', 'url'=>array('update', 'id'=>$model->idHora)),
	array('label'=>'Eliminar horas empleados', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idHora),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar horas empleados', 'url'=>array('admin')),
);
?>

<h1>Ver horas empleados #<?php echo $model->idHora; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idHora',
		'idEmpleado',
		'justificado',
		'estadoHora',
		'fechaHoraTrabajo',
		'entradaSalida',
		'comentarioHora',
	),
)); ?>
