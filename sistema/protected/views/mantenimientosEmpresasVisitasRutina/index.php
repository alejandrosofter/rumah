<?php
$this->breadcrumbs=array(
	'Mantenimientos Empresas Visitas Rutinas',
);

$this->menu=array(
	array('label'=>'Crear Rutina Visita', 'url'=>array('create&idMantenimientoEmpresa='.$modelo->idMantenimientoEmpresa)),
	array('label'=>'Manage Rutina Visita', 'url'=>array('admin')),
);
?>

<h1>Mantenimientos Empresas Visitas Rutinas</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'mantenimientos-empresas-visitas-rutina-grid',
	'dataProvider'=>$modelo->with('mantenimientosEmpresas','clientes')->search(),
	'filter'=>$model,
	'columns'=>array(
//		'idMantenimientoEmpresaVisitaRutina',
//		'idMantenimientoEmpresa',
		'clientes.nombre',
		'clientes.apellido',
		'semana',
//		'nombreDia',
		'idDia',
		'hora',
		'mantenimientosEmpresas.estadoMatenimiento',

		/*
		'divisorSemana',
		'horaIngreso',
		'horaSalida',
		'comentarioVisita',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
