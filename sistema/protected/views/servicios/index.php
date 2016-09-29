<?php
$this->breadcrumbs=array(
	'Centro de Servicios'=>array('/servicios/centroServicios'),
	'Servicios'
);

$this->menu=array(
	array('label'=>'Nuevo Servicio', 'url'=>array('create')),
	array('label'=>'Listado de Servicios'),
	array('label'=>'Cuentas', 'url'=>array('/cuentas')),
	array('label'=>'Listas de Precios', 'url'=>array('/stockPrecios')),
	
);
?>

<h1>Servicios</h1>
Listado de Serivicios prestados
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'servicios-grid',
    'ajaxUpdate'=>false,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nombre',
		'detalle:html',

		'porcentajeIva',
		array(
                    'header'=>'$ LISTA',
                  'name'=>'precioLista',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->precioLista,"$")',
                ),
        array(
            'header'=>'$ MINIMO',
                  'name'=>'precioMinimo',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->precioMinimo,"$")',
                ),
        array(
            'header'=>'$ NETO',
                  'name'=>'importeSinIva',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->importeSinIva,"$")',
                ),
		/*
		'min',
		'max',
		'tipoProducto',
		'idTipoProducto',
		'idCuenta',
		*/
		array(
			'class'=>'CButtonColumn','template' => '{precio} {view} {update} {delete}',
			'buttons' => array(
                            'precio' => array(
                               
                    			'label'=>'Asignar precio al producto',     
                    			'url'=>'Yii::app()->createUrl("stockPreciosItems/create",array("precioCompra"=>0,"idStock"=>$data->idStock,"minimo"=>$data->precioMinimo / (($data->porcentajeIva/100)+1),"lista"=>$data->importeSinIva,"porcentajeIva"=>$data->porcentajeIva))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/money_add.png',  // image URL of the button. If not set or false, a text link is used
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
