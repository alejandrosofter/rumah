<?php
$this->breadcrumbs=array(
	'Rutinas Ordenes Trabajos',
);

$this->menu=array(
	array('label'=>'Nueva Rutina', 'url'=>array('create')),
);
?>

<h1>Rutinas</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'rutinas-ordenes-trabajo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nombreRutina',
		array(
                  'name'=>'esFacturable',
                    'type'=>'html',
                       'value'=>'($data->esFacturable==1)?"si":"no"', 
                
                ),
		array(
                  'name'=>'esContratada',
                    'type'=>'html',
                       'value'=>'($data->esContratada==1)?"si":"no"', 
                
                ),
		'duracionDias',
		'prioridad',
            array(
                  'name'=>'esPredeterminada',
                    'type'=>'html',
                       'value'=>'($data->esPredeterminada==1)?"si":"no"', 
                
                ),
		/*
		'descripcionCliente',
		'descripcionEncargado',
		*/
		array(
			'class'=>'CButtonColumn','template' => '{recursos} {estados} {impresiones} {update} {delete}',
			'buttons' => array(
                            'recursos' => array(
                    			'label'=>'Recursos',
                    			'url'=>'Yii::app()->createUrl("rutinasRecursos/index",
                    			array("id"=>$data->idOrdenTrabajoRutina))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/lorry.png',
                    
                            ),
                            'estados' => array(
                    			'label'=>'Estados Pre asignados a la rutina',
                    			'url'=>'Yii::app()->createUrl("rutinasEstadosOrdenesTrabajo/index",
                    			array("id"=>$data->idOrdenTrabajoRutina))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/script.png',
                    
                            ),
                            'impresiones' => array(
                    			'label'=>'Impresiones de la Rutina',
                    			'url'=>'Yii::app()->createUrl("rutinasImpresiones/index",
                    			array("id"=>$data->idOrdenTrabajoRutina))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/printer.png',
                    
                            ),
								
                            ),
		),
	),
)); ?>