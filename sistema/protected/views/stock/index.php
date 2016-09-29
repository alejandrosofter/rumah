<?php
$this->breadcrumbs=array(
	'Centro de Productos'=>array('centroStock'),'Listado de Stock'
);

$this->menu=array(
	array('label'=>'Listar Producto'),
	array('label'=>'Crear Producto', 'url'=>array('create')),
	array('label'=>'Tipo Productos', 'url'=>array('/stockTipoProducto')),
	array('label'=>'Listas de Precios', 'url'=>array('/stockPrecios')),
);
?>

<h1>Stocks</h1>
Listado de Productos
<?php $this->renderPartial('/varios/buscadorVario', array(),false); ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'stock-grid',
    'ajaxUpdate'=>false,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(

		array(
                        'header'=>'Nombre',
                        'name'=>'nombre',
                        'filter'=>CHtml::textField('nombre',(isset($_GET['nombre']) ? $_GET['nombre'] : "")),
                        'value'=>'$data->nombre',
                		'type'=>'raw',
                ),
		
		'codigoBarra',
		'porcentajeIva',
        array(
                        'header'=>'Tipo Producto',
                        'name'=>'tipoProducto',
                        'filter'=>CHtml::textField('tipoProducto',(isset($_GET['tipoProducto']) ? $_GET['tipoProducto'] : "")),
                        'value'=>'$data->tipoProducto',
                		'type'=>'raw',
                ),
		
		/*
		'min',
		'max',
		'tipoProducto',
		'idTipoProducto',
		'idCuenta',
		*/
		array(
			'class'=>'CButtonColumn','template' => '{imprimir} {view} {update} {delete}',
			'buttons' => array(
                            'imprimir' => array(
                               
                    			'label'=>'Imprimir',     
                    			'url'=>'Yii::app()->createUrl("/stock/imprimirCodigo",array("id"=>$data->idStock))'   ,    // the PHP expression for generating the URL of the button
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
                            ),
		),
	),
)); ?>
<div id="id_view"></div>