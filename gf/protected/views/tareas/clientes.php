<?php
$this->breadcrumbs=array(
	'Matenimientos Empresas'=>array('/mantenimientosEmpresas'),$cliente,'Tareas'
);

$this->menu=array(
	array('label'=>'Listar Tareas', 'url'=>array('cliente&idCliente='.$idCliente.'&cliente='.$cliente)),
	array('label'=>'Listar Pendientes', 'url'=>array('pendientes&idCliente='.$idCliente.'&cliente='.$cliente)),
	array('label'=>'Nueva Tarea', 'url'=>array('create&idCliente='.$idCliente.'&cliente='.$cliente)),
);
?>

<h1>Tareas <?php echo $cliente ?></h1>
A continuación se muestran todas las tareas de la empresa:
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tareas-grid',
	'dataProvider'=>$tareas,
	'columns'=>array(
		array(
                  'name'=>'fechaTarea',
                    'type'=>'html',
                    'value'=>'($data->fechaTarea=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fechaTarea);',
                    'htmlOptions' => array('style'=>'width:90px;')
                ),
		

		'descripcionTarea',
		 array(
                  'name'=>'tipoTarea',
                    'type'=>'html',
                    'value'=>'(($data->visitaRutina)?"<b>Visita</b> ":"Evento/Tarea ").$data->tipoTarea',
                ),
		array(
                  'name'=>'cantidadTareas',
                    'type'=>'html',
                    'value'=>'CHtml::link("ver (".$data->cantidadTareas.")",Yii::app()->createUrl("tareasEstados/estadosTarea",array("idCliente"=>'.$idCliente.',"id"=>$data->idTarea,"cliente"=>$data->cliente)))',
                ),
            array(
                  'name'=>'estadoTarea',
                    'type'=>'html',
                    'value'=>'($data->estadoTarea=="Finalizada")?CHtml::image("images/iconos/famfam/accept.png"):CHtml::image("images/iconos/famfam/error.png")',
                ),
           
		array(
			'class'=>'CButtonColumn',
			'template' => '{personal} {finalizar} {view} {update} {delete}',
			'buttons' => array(
                            'finalizar' => array(
                    			'label'=>'Finalizar',     // text label of the button
                    			'options'=>array('style'=>'width:150px'),
                    			'url'=>'Yii::app()->createUrl("tareasEstados/create",array("id"=>$data->idTarea,"cliente"=>$data->cliente,"idCliente"=>$data->idClienteTarea))'   ,    // the PHP expression for generating the URL of the button
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/arrow_right.png',  // image URL of the button. If not set or false, a text link is used
                    
                            ),
                            
                            'personal' => array(
                    			'label'=>'Personal',
                    			'url'=>'Yii::app()->createUrl("tareasDestinatarios/tareas",array("id"=>$data->idTarea,"cliente"=>$data->cliente,"idCliente"=>$data->idClienteTarea))'   ,    // the PHP expression for generating the URL of the button
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/group.png',  // image URL of the button. If not set or false, a text link is used
                    
                            ))
			
		),
	),
)); ?>

