<?php
$this->breadcrumbs=array(
	'Centro de Servicios'=>array('/servicios/centroServicios') ,'Ordenes Trabajo',
);

$this->menu=array(
array('label'=>"Sin Asignar(".($model->buscarPorEstado('Sin Asignar')->getTotalItemCount()).")", 'url'=>array('porEstado&estado=Sin Asignar')),
	array('label'=>"Trabajando(".($model->buscarPorEstado('Trabajando')->getTotalItemCount()).")", 'url'=>array('porEstado&estado=Trabajando')),
	array('label'=>"Stand-By(".($model->buscarPorEstado('Stand-by')->getTotalItemCount()).")", 'url'=>array('porEstado&estado=Stand-by')),
	array('label'=>"Tercero(".($model->buscarPorEstado('Tercero')->getTotalItemCount()).")", 'url'=>array('porEstado&estado=Tercero')),
	array('label'=>"Realizadas(".($model->buscarPorEstado('Realizada')->getTotalItemCount()).")", 'url'=>array('porEstado&estado=Realizada')),
    array('label'=>"Facturadas(".($model->buscarPorEstado('Facturado')->getTotalItemCount()).")", 'url'=>array('porEstado&estado=Facturado')),
	
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
    'ajaxUpdate'=>false,
	'dataProvider'=>$model->buscarPorEstado($estado),
//	'selectionChanged'=>'setVars',
	'filter'=>$model,
	'columns'=>array(
array(
                    'header'=>'Nº',
                    'name'=>'idOrdenTrabajo',
                    'filter'=>CHtml::textField('idOrdenTrabajo',(isset($_GET['idOrdenTrabajo']) ? $_GET['idOrdenTrabajo'] : "")),
                    'type'=>'html',
                    'value'=>'CHtml::link($data->idOrdenTrabajo." (".$data->cantidadEstados.")",Yii::app()->createUrl("ordenesTrabajoEstados/verEstadosOrden",array("id"=>$data->idOrdenTrabajo)),array("rel"=>"twipsy","title"=>"ESTADOS <br> $data->estados <br> FECHA: ".Yii::app()->dateFormatter->format("dd-M-y",$data->fechaIngreso)))', 
                ),
                array(
                  'name'=>'cliente',
                    'type'=>'html',
                     'filter'=>CHtml::textField('cliente',(isset($_GET['cliente']) ? $_GET['cliente'] : "")),
                    'value'=>'CHtml::link($data->cliente,
                    Yii::app()->createUrl("clientes/view",array("id"=>$data->idCliente)))',
                ),
             
                

//		array(
//                  'name'=>'fechaIngreso',
//                    'htmlOptions' => array('style'=>'width:65px;'),
//                    'type'=>'html',
//                    'value'=>'($data->fechaIngreso=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fechaIngreso);',
//                ),
		
		array(
                  'name'=>'descripcionCliente',
                    'type'=>'html',
                     'filter'=>CHtml::textField('descripcionCliente',(isset($_GET['descripcionCliente']) ? $_GET['descripcionCliente'] : "")),
                    'value'=>'$data->descripcionCliente',
                ),
            array(
                        'header'=>'Usuario',
                        'name'=>'usuario',
                        
                        'value'=>'$data->usuario',
                		'type'=>'raw',
                ),
		
     
             array(
                  'name'=>'diasFaltantes',
                    'type'=>'html',
                    'value'=>'is_null($data->diasFaltantes)?"sin/venc":($data->diasFaltantes>0?"<font color=red>Vencida </font>":($data->diasFaltantes==0?"<font color=orange>Vence HOY!</font>":"".-$data->diasFaltantes. " dia/s"))',
                    'htmlOptions' => array('style'=>'width:50px;'),
                 ),
array(
                    'header'=>'$',
                    'name'=>'costo',
                    'type'=>'html',
                    'value'=>'CHtml::link(Yii::app()->numberFormatter->formatCurrency($data->costo,"$"),Yii::app()->createUrl("ordenesTrabajoStock/index",array("id"=>$data->idOrdenTrabajo)),array())', 
                ),
      
                array(
			'class'=>'CButtonColumn',
			
                    'template' => '{facturar} {imprimir} {seguimiento} {update} {delete}',
			'buttons' => array(
			'facturar' => array(        						
                    			'label'=>'Facturar Orden',
                    			'url'=>'Yii::app()->createUrl("facturasSalientes/crearFactura",array("idOrdenTrabajo"=>",".$data->idOrdenTrabajo))'   ,    // the PHP expression for generating the URL of the button
                    			'imageUrl'=>isset($data->facturada)?Yii::app()->request->baseUrl.("/images/iconos/famfam/1.png"):Yii::app()->request->baseUrl.("/images/iconos/famfam/money_add.png"),
                   				'visible'=>'isset($data->facturada)?false:true'
                            ),
                            'stock' => array(        						
                    			'label'=>'Ver productos Asignados',
                    			'url'=>'Yii::app()->createUrl("ordenesTrabajoStock/index",array("id"=>$data->idOrdenTrabajo))'   ,    // the PHP expression for generating the URL of the button
                    			'imageUrl'=>Yii::app()->request->baseUrl.("/images/iconos/famfam/lorry.png"),
                   			
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
		/*
		'prioridad',
		'tipoOrden',
		'observaciones',
		*/
		
	),
));
?>


<div id="id_view"></div>