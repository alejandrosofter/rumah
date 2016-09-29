<?php
$this->breadcrumbs=array(
	'Contratos',
);

$this->menu=array(
	array('label'=>'Nuevo Contrato', 'url'=>array('create')),
	array('label'=>'Listar Contratos', 'url'=>array('index')),
//	array('label'=>'Mis Tareas', 'url'=>array('tareas/verMisTareas')),
//	array('label'=>'Imprimir Mantenimientos', 'url'=>array('tareas/imprimirTareas')),

);
?>
<?php $this->widget('ext.bootstrap.widgets.BootTwipsy',array(
    'selector'=>'a[title]',
)); ?>
<h1>CONTRATOS</h1>

A continuación se muestran los contratos pactados. Del cual puede ingresar inquietudes o TAREAS PENDIENTES:..
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'mantenimientos-empresas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                  'name'=>'cliente',
                    'type'=>'html',
                    'value'=>'CHtml::link("$data->cliente",Yii::app()->createUrl("tareas/cliente",array("idCliente"=>$data->idClienteEmpresa,"cliente"=>$data->cliente)))',
                ),
		
       //		'fechaInicioEmpresa',
		array(
                  'name'=>'fechaInicioEmpresa',
                    'type'=>'html',
                     
                    'value'=>'($data->fechaInicioEmpresa=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fechaInicioEmpresa)'
		),
		array(
                  'header'=>'Proxima Fact.',
                    'type'=>'html',
                   
                    'value'=>'-$data->diasProximaFacturacion." dias"'
		),
		array(
                  'header'=>'Fin Contrato',
                    'type'=>'html',
                    'value'=>'-$data->finContrato." dias"'
		),
		'estadoMatenimiento',
		

		/*
		'tipoMantenimiento',
		*/
		array(
			'class'=>'CButtonColumn',
			'template' => ' {tareasCrons} {impresionPendientes} {impresiontareas} {tareas} {update} {delete}',
			'buttons' => array(
			 'tareasCrons' => array(
                    			'label'=>'Tareas Programadas',
                    			'url'=>'Yii::app()->createUrl("/mantenimientosEmpresas/tareasProgramadas",array("idCliente"=>$data->idClienteEmpresa))'   ,    
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/clock.png', 
                    
                            ),
                            'visitas' => array(
                    			'label'=>'Visitas',
                    			'url'=>'Yii::app()->createUrl("mantenimientosEmpresasVisitasRutina",array("idMantenimientoEmpresa"=>$data->idClienteEmpresa))'   ,    
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/car.png', 
                    
                            ),
                            'tareas' => array(
                    			'label'=>'Tareas',
                    			'url'=>'Yii::app()->createUrl("tareas/cliente",array("idCliente"=>$data->idClienteEmpresa,"cliente"=>$data->cliente))'   ,    
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/table_gear.png', 
                    
                            ),
                         'impresionPendientes' => array(
                    			'label'=>'Imprimir Pendientes',
                    			'url'=>'Yii::app()->createUrl("tareas/imprimirPendientes",array("idCliente"=>$data->idClienteEmpresa,"cliente"=>$data->cliente))'   ,    
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/printer_error.png', 
                            ),
                            'impresiontareas' => array(
                    			'label'=>'Imprimir Tareas Rango',
                    			'url'=>'Yii::app()->createUrl("tareas/getReporteEmpresa",array("idCliente"=>$data->idClienteEmpresa,"cliente"=>$data->cliente))'   ,    
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/printer.png', 
                            ),
                            )
		),
	),
)); ?>
