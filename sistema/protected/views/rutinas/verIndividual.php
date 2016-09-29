<?php
$this->breadcrumbs=array(
	'Mantenimientos Empresas'=>array('/mantenimientosEmpresas'),'Rutinas pactadas'
);

$this->menu=array(

	array('label'=>'Crear Rutina Visita', 'url'=>array('create&idMantenimientoEmpresa='.$idMantenimientoEmpresa)),
	array('label'=>'Manage Rutina Visita', 'url'=>array('admin')),
);
?>

<h1>RUTINAS PACTADAS</h1>

<?php 
	echo $varCliente;
	echo $idMantenimientoEmpresa;
	    
?>

<?php 
		$array[1]= 'Lunes';
		$array[2]= 'Martes';
		$array[3]= 'Miercoles';
		$array[4]= 'Jueves';
		$array[5]= 'Viernes';
		$array[6]= 'Sabado';
		$array[7]= 'Domingo';
//		$data = array(Lunes,Martes,Miercoles,Jueves,Viernes,Sabado,Domingo);
		

		
		
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'mantenimientos-empresas-visitas-rutina-grid',
	'dataProvider'=>$modelo->with('manteminientosRutina','mantenimientosEmpresas')->searchEmpresas($idMantenimientoEmpresa),
														  
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

		/*
		'divisorSemana',
		'horaIngreso',
		'horaSalida',
		'comentarioVisita',
		*/
		array(
			'class'=>'CButtonColumn',
			'template' => ' {view} {update} {delete}',
			'buttons' => array(
                            'view' => array(
                    			
                    			'url'=>'Yii::app()->createUrl("rutinas/view",array("id"=>$data->idRutina,"idMantenimientoEmpresa"=>'.$idMantenimientoEmpresa.'))'   ,     
                    			 
                    
                            ),
                            'update' => array(
                    		
                    			'url'=>'Yii::app()->createUrl("rutinas/update",array("id"=>$data->idRutina,"idMantenimientoEmpresa"=>'.$idMantenimientoEmpresa.'))'   ,       
                    			
                    
                            ),
                            )
		),
	),
)); ?>

