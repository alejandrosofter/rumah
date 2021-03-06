<?php
$this->breadcrumbs=array(
	'Centro de Servicios'=>array('/servicios/centroServicios') ,'Ordenes Trabajo',
);

$this->menu=array(
array('label'=>"Sin Asignar(".($model->buscarPorEstado('')->getTotalItemCount()).")", 'url'=>array('porEstado&estado=')),
	array('label'=>"Trabajando(".($model->buscarPorEstado('Trabajando')->getTotalItemCount()).")", 'url'=>array('porEstado&estado=Trabajando')),
	array('label'=>"Stand-By(".($model->buscarPorEstado('Stand-by')->getTotalItemCount()).")", 'url'=>array('porEstado&estado=Stand-by')),
	array('label'=>"Tercero(".($model->buscarPorEstado('Tercero')->getTotalItemCount()).")", 'url'=>array('porEstado&estado=Tercero')),
	array('label'=>"Realizadas(".($model->buscarPorEstado('Realizada')->getTotalItemCount()).")", 'url'=>array('porEstado&estado=Realizada')),
	
	array('label'=>"Todas(".($model->search()->getTotalItemCount()).")", 'url'=>array('porEstado&estado=')),
	array('label'=>'Crear Orden', 'url'=>array('create')),
	
);
?>

<h1>ORDENES DE TRABAJO</h1>
<?php 
$this->widget('ext.bootstrap.widgets.BootAlert',array(
    'id'=>'alert',
    'keys'=>array('success','info','warning','error'),
)); 
?>
<?php $this->widget('ext.bootstrap.widgets.BootTwipsy',array(
    'selector'=>'a[title]',
)); ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ordenes-trabajo-grid',
	'dataProvider'=>$model->search(),
//	'selectionChanged'=>'setVars',
	'filter'=>$model,
	'columns'=>array(

	array(
			'class'=>'CButtonColumn',
			'template' => '{carro}{imprimir} {seguimiento}',
			'buttons' => array(
			'carro' => array(        						
                    			'label'=>'Agregar al Carro para facturar',
                    			'url'=>'Yii::app()->createUrl("ordenesTrabajo/agregarCarro",array("idOrdenTrabajo"=>$data->idOrdenTrabajo))'   ,    // the PHP expression for generating the URL of the button
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/cart.png',  // image URL of the button. If not set or false, a text link is used
                   				'visible'=>'isset($data->facturada)?false:true'
                            ),
                           
                            'imprimir' => array(
                               
                    			'label'=>'Imprimir',     
                    			'url'=>'Yii::app()->createUrl("ordenesTrabajo/imprimir",array("idOrdenTrabajo"=>$data->idOrdenTrabajo))'   ,    // the PHP expression for generating the URL of the button
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/printer.png',  // image URL of the button. If not set or false, a text link is used
                    'options'=>array(  
    'ajax'=>array(
            'type'=>'POST',
                // ajax post will use 'url' specified above 
            'url'=>"js:$(this).attr('href')", 
            'update'=>'#id_view',
           ),
     ),
     ),
                           
                            'finalizar' => array(
                    			'label'=>'Estados',     // text label of the button
                    			'options'=>array('style'=>'width:150px'),
                    			'url'=>'Yii::app()->createUrl("ordenesTrabajoEstados/create",array("id"=>$data->idOrdenTrabajo))'   ,    // the PHP expression for generating the URL of the button
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/arrow_right.png',  // image URL of the button. If not set or false, a text link is used
                    
                            ),
                            'seguimiento' => array(
                    			'label'=>'Seguimiento de la Orden',
                    			'url'=>'Yii::app()->createUrl("facturasOrdenesTrabajo/",array("idOrdenTrabajo"=>$data->idOrdenTrabajo))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/eye.png',
                    
                            ),
                            )
		),
	
      
                array(
                  'name'=>'cliente',
                    'type'=>'html',
                     'filter'=>CHtml::textField('cliente',(isset($_GET['cliente']) ? $_GET['cliente'] : "")),
                    'value'=>'CHtml::link($data->cliente,
                    Yii::app()->createUrl("clientes/view",array("id"=>$data->idCliente)))',
                ),
             
                array(
                        'header'=>'Nº Orden',
                        'name'=>'idOrdenTrabajo',
                        'filter'=>CHtml::textField('idOrdenTrabajo',(isset($_GET['idOrdenTrabajo']) ? $_GET['idOrdenTrabajo'] : "")),
                        'value'=>'$data->idOrdenTrabajo',
                		'type'=>'raw',
                ),

		array(
                  'name'=>'fechaIngreso',
                    'type'=>'html',
                    'value'=>'($data->fechaIngreso=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fechaIngreso);',
                ),
		
		'descripcionCliente',
		array(
                  'name'=>'cantidadEstados',
                  'header'=>'Estados',
                    'type'=>'html',
                    'value'=>'CHtml::link("estados (".$data->cantidadEstados.")",Yii::app()->createUrl("ordenesTrabajoEstados/verEstadosOrden",array("id"=>$data->idOrdenTrabajo)),array("rel"=>"twipsy","title"=>"ESTADOS <br> $data->estados"))', 
                ),
 array(
                  'name'=>'facturada',
                    'type'=>'html',
                    'value'=>'isset($data->facturada)?CHtml::image("images/iconos/famfam/1.png"):CHtml::image("images/iconos/famfam/bullet_error.png")',
                ),

      
                array(
			'class'=>'CButtonColumn',
			'template' => '{view} {update} {delete}',
			
		),
		/*
		'prioridad',
		'tipoOrden',
		'observaciones',
		*/
		
	),
));
?>


<div id="id_view"></div>