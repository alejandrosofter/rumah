<?php
$this->breadcrumbs=array(
	'Presupuestos'=>array('index'),
	'Ver',
);

$this->menu=array(
        array('label'=>"Apobados(".($model->search('Aprobado')->getTotalItemCount()).")", 'url'=>array('index&estado=Aprobado')),
        array('label'=>"Desaprobados(".($model->search('Rechazado')->getTotalItemCount()).")", 'url'=>array('index&estado=Rechazado')),
        array('label'=>"Pendientes(".($model->search('Para Aprobar')->getTotalItemCount()).")", 'url'=>array('index&estado=Para Aprobar')),
	array('label'=>"Todos(".($model->search('')->getTotalItemCount()).")", 'url'=>array('index&estado=')),
	array('label'=>'Nuevo Presupuesto', 'url'=>array('create')),
);

?>

<h1>PRESUPUESTOS</h1>

<?php $this->widget('ext.bootstrap.widgets.BootTwipsy',array(
    'selector'=>'a[title]',
)); ?>
<p>
Realize presupuestos a clientes de una forma facil
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'presupuestos-grid',
    'ajaxUpdate'=>false,
	'dataProvider'=>$model->search(isset ($_GET['estado'])?$_GET['estado']:''),
	'filter'=>$model,
	'columns'=>array(
		array(
			'class'=>'CButtonColumn','template' => '{imprimir}{orden}{aprobar}{rechazar}{items} ',
			'buttons' => array(
			 'imprimir' => array(
                               
                    			'label'=>'Imprimir',     
                    			'url'=>'Yii::app()->createUrl("/impresiones/imprimirAlgo",array("id"=>$data->idPresupuesto,"tipo"=>"presupuesto"))'   ,    // the PHP expression for generating the URL of the button
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/printer.png',  // image URL of the button. If not set or false, a text link is used
                    'options'=>array(  
    'ajax'=>array(
            'type'=>'POST',
                // ajax post will use 'url' specified above 
            'url'=>"js:$(this).attr('href')", 
            'update'=>'#id_view',
           ),
     ),
     ), 'facturar' => array(
                    			'label'=>'Facturar Presupuesto',
                    			'url'=>'Yii::app()->createUrl("facturasSalientes/crearFactura",array("idPresupuestoFacturar"=>$data->idPresupuesto))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/money_add.png',
                    
                            ),
                            'items' => array(
                    			'label'=>'Items',
                    			'url'=>'Yii::app()->createUrl("presupuestoItems/",array("idPresupuesto"=>$data->idPresupuesto))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/basket_put.png',
                    
                            ),
                             'aprobar' => array(
                    			'label'=>'Aprobar',
                    			'url'=>'Yii::app()->createUrl("presupuestos/aprobar",array("idPresupuesto"=>$data->idPresupuesto))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/accept.png',
                    
                            ),
                             'rechazar' => array(
                    			'label'=>'Rechazar',
                    			'url'=>'Yii::app()->createUrl("presupuestos/rechazar",array("idPresupuesto"=>$data->idPresupuesto))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/cancel.png',
                    
                            ),
                            'orden' => array(
                    			'label'=>'Generar Orden de Trabajo',
                    			'url'=>'Yii::app()->createUrl("ordenesTrabajo/generarOrden",array("idPresupuesto"=>$data->idPresupuesto))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/page_add.png',
                    
                            ),
                            ),
		),
		array(
                  'name'=>'fechaPresupuesto',
                    'type'=>'html',
                    'value'=>'($data->fechaPresupuesto=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fechaPresupuesto);',
                ),
		'asuntoPresupuesto',
		array(
                  'name'=>'cliente',
                    'type'=>'html',
                     'filter'=>CHtml::textField('cliente',(isset($_GET['cliente']) ? $_GET['cliente'] : "")),
                    'value'=>'CHtml::link($data->cliente,
                    Yii::app()->createUrl("clientes/view",array("id"=>$data->idClientePresupuesto)))',
                ),
            array(
                  'name'=>'avisa',
                    'type'=>'html',
                'header'=>'Avisar en ...',
                'value'=>'is_null($data->avisa)?"sin/venc":($data->avisa>0?"<font color=red>Vencida </font>":($data->avisa==0?"<font color=orange>Vence HOY!</font>":"".-$data->avisa. " dia/s"))',
                  
                ),
            array(
                  'name'=>'vence',
                'header'=>'Vence en ...',
                    'type'=>'html',
                    'value'=>'is_null($data->vence)?"sin/venc":($data->vence>0?"<font color=red>Vencida </font>":($data->vence==0?"<font color=orange>Vence HOY!</font>":"".-$data->vence. " dia/s"))',
                  
                 ),
            
          
		
		/*
		'precioEspecial',
		'formaPago',
		'fechaentrega',
		'porcentajeIva',
		'estado',
		'tipoPresupuesto',
		*/
		

		array(
                  'name'=>'ordenTrabajo',
                    'type'=>'html',
                    'header'=>'Estado',
                    'value'=>'$data->estado=="Aprobado"?CHtml::link(CHtml::image("images/iconos/famfam/accept.png",$data->estado),"#",array("rel"=>"twipsy","title"=>"$data->estado")):($data->estado=="Rechazado"?CHtml::link(CHtml::image("images/iconos/famfam/cancel.png"),"#",array("rel"=>"twipsy","title"=>"$data->estado")):CHtml::link(CHtml::image("images/iconos/famfam/error.png"),"#",array("rel"=>"twipsy","title"=>"$data->estado")))',
                ),
            array(
                    'type'=>'html',
                  'name'=>'importePresupuesto',
                    'value'=>'"<b>".Yii::app()->numberFormatter->formatCurrency($data->importePresupuesto,"$")."</b>"',
                ),
		array(
			'class'=>'CButtonColumn','template' => "{trabajando}{update}{delete}" ,
			'buttons' => array(
			
                             'trabajando' => array(
                    			'label'=>'trabajando',
                                        'visible'=>'isset($data->ordenTrabajo)',
                    			'url'=>'Yii::app()->createUrl("presupuestosOrdenesTrabajo/",array("idPresupuesto"=>$data->idPresupuesto))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/wrench.png',
                    
                            ),
			
		),
		
	),)
)); ?>
<div id="id_view"></div>