<?php
$this->breadcrumbs=array(
	'Mantenimientos Empresas Visitas Rutinas'=>array('index'),
	$model->idMantenimientoEmpresaVisitaRutina,
);

$this->menu=array(
	array('label'=>'Listar Rutina de Visitas', 'url'=>array('verIndividual&idMantenimientoEmpresa='.$model->idMantenimientoEmpresa)),
	array('label'=>'Crear Rutina Visita', 'url'=>array('create&idMantenimientoEmpresa='.$model->idMantenimientoEmpresa)),
	array('label'=>'Actualizar Rutina Visita', 'url'=>array('update', 'id'=>$model->idMantenimientoEmpresaVisitaRutina)),
	array('label'=>'Manage Rutina Visita', 'url'=>array('admin')),
);
?>

<h1>Ver Rutina de Visitas #<?php echo $model->idMantenimientoEmpresaVisitaRutina; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'idMantenimientoEmpresaVisitaRutina',
//		'idMantenimientoEmpresa',
		'clientes.nombre',
		'clientes.apellido',
		'semana',
		'mantenimientosEmpresas.estadoMatenimiento',

//		'nombreDia',
		'idDia',
		'hora',
//		'divisorSemana',
//		'horaIngreso',
//		'horaSalida',
		'comentarioVisita',
	),
)); ?>
