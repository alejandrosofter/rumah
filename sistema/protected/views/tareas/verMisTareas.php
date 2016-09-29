<?php
$this->breadcrumbs=array(
	'Centro de Tareas'=>array('/tareas/centroTareas'),
	'Mis Tareas'
);

$this->menu=array(
	array('label'=>'Listar Tareas', 'url'=>array('index')),
	array('label'=>'Mis Tareas'),
	array('label'=>'Nueva Tarea', 'url'=>array('create')),
	array('label'=>'Imprimir', 'url'=>array('/impresiones/create&tipoImpresion=misTareas')),
	
);
?>

<h1>Mis Tareas</h1>
A continuación se muestran todas las tareas que TIENES para realizar, sin importar AREA o CLIENTE.
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tareas-grid',
	'dataProvider'=>$model->consultarMisTareas(),
'filter'=>$model,
	'columns'=>array(
array(
                  'name'=>'cliente',
                    'type'=>'html',
                     'filter'=>CHtml::textField('cliente',(isset($_GET['cliente']) ? $_GET['cliente'] : "")),
                    'value'=>'CHtml::link($data->cliente,
                    Yii::app()->createUrl("clientes/view",array("id"=>$data->idCliente)))',
                ),
//		'fechaTarea',
		array(
                  'name'=>'fechaTarea',
                    'type'=>'html',
                    'value'=>'($data->fechaTarea=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fechaTarea);',
                ),
                 array(
                        'header'=>'Prioridad Tarea',
                        'name'=>'prioridadTarea',
                        'filter'=>CHtml::textField('prioridadTarea',(isset($_GET['prioridadTarea']) ? $_GET['prioridadTarea'] : "")),
                        'value'=>'$data->prioridadTarea',
                		'type'=>'raw',
                ),

                array(
                        'header'=>'Estado Tarea',
                        'name'=>'estadoTarea',
                        'filter'=>CHtml::textField('estadoTarea',(isset($_GET['estadoTarea']) ? $_GET['estadoTarea'] : "")),
                        'value'=>'$data->estadoTarea',
                		'type'=>'raw',
                ),
		
		'descripcionTarea',
		'tipoTarea',
		array(
                  'name'=>'cantidadTareas',
                    'type'=>'html',
                    'value'=>'CHtml::link("ver (".$data->cantidadTareas.")",Yii::app()->createUrl("tareasEstados/estadosTarea",array("idCliente"=>$data->idClienteTarea,"id"=>$data->idTarea,"cliente"=>$data->cliente)))',
                ),
       array(
			'class'=>'CButtonColumn',
			'template' => '{coordinar} ',
       		'header' => 'Coordinar',
			'buttons' => array(
                             'coordinar' => array(
                    			'label'=>'Coordinar Tarea',
                    			'url'=>'Yii::app()->createUrl("tareasCoordinaciones/cargarCoordinacion",array("idTarea"=>$data->idTarea,))'   ,    // the PHP expression for generating the URL of the button
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/calendar_add.png',  // image URL of the button. If not set or false, a text link is used
                   				'visible'=>'$data->checkTarea<=0',
                            )

                            )
			
		),
		array(
			'class'=>'CButtonColumn',
			'header' => 'Acciones',
			'template' => ' {personal} {finalizar} {view} {update} {delete}',
			'buttons' => array(
                            'finalizar' => array(
                    			'label'=>'Agregar Estado',     // text label of the button
                    			'options'=>array('style'=>'width:150px'),
                    			'url'=>'Yii::app()->createUrl("tareasEstados/create",array("id"=>$data->idTarea,"cliente"=>$data->cliente,"idCliente"=>$data->idClienteTarea))'   ,    // the PHP expression for generating the URL of the button
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/arrow_right.png',  // image URL of the button. If not set or false, a text link is used
                    
                            ),
                            
                            'personal' => array(
                    			'label'=>'Personal',
                    			'url'=>'Yii::app()->createUrl("tareasDestinatarios/tareas",array("id"=>$data->idTarea,"cliente"=>$data->cliente,"idCliente"=>$data->idClienteTarea))'   ,    // the PHP expression for generating the URL of the button
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/group.png',  // image URL of the button. If not set or false, a text link is used
                    
                            )
//'buttonID' => array(
//    'label'=>'...',     // text label of the button
//    'url'=>'...',       // a PHP expression for generating the URL of the button
//    'imageUrl'=>'...',  // image URL of the button. If not set or false, a text link is used
//    'options'=>array(...), // HTML options for the button tag
//    'click'=>'...',     // a JS function to be invoked when the button is clicked
//    'visible'=>'...',   // a PHP expression for determining whether the button is visible
//)
                            )
			
		),
	),
)); ?>
