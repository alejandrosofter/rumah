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

<?php 
	echo $varCliente;
	
	    
?>

<?php 
		$array[1]= 'Lunes';
		$array[2]= 'Martes';
		$array[3]= 'Miercoles';
		$array[4]= 'Jueves';
		$array[5]= 'Viernes';
		$array[6]= 'Sabado';
		$array[7]= 'Domingo';
		$data = array(Lunes,Martes,Miercoles,Jueves,Viernes,Sabado,Domingo);
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'mantenimientos-empresas-visitas-rutina-grid',
	'dataProvider'=>$modelo->with('mantenimientosEmpresas','clientes')->search(),
	'filter'=>$model,
	'columns'=>array(
//		'idMantenimientoEmpresaVisitaRutina',
//		'idMantenimientoEmpresa',
//		'clientes.nombre',
//		'clientes.apellido',
		'semana',
//		'nombreDia',
		
array(
                  'name'=>'idDia',
                    'type'=>'text',
                    'value'=> $data[$modelo->idDia],
                ),
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

