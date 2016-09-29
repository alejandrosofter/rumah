<?php
$this->breadcrumbs=array(
	'Tareas Pendientes'
);

$this->menu=array(
	array('label'=>'Listar Tareas', ),
	array('label'=>'Nueva Tarea', 'url'=>array('create')),
	
);
?>

<h1>Tareas Pendientes</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tareas-grid',
	'dataProvider'=>$model->tareasPendientes(),
	'filter'=>$model,
	'columns'=>array(
		'cliente',
		//		'fechaTarea',
		array(
                  'name'=>'fechaTarea',
                    'type'=>'html',
                    'value'=>'($data->fechaTarea=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fechaTarea);',
                ),
		'prioridadTarea',
		'descripcionTarea',
		'tipoTarea',
		'estadoTarea',
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

                            )
			
		)
	),
)); ?>
