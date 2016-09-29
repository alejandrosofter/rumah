<?php
$this->breadcrumbs=array(
	'Centro de Productos'=>array('centroStock'),'Listado de Stock REAL'
);

$this->menu=array(
	array('label'=>'Stock (disponibilidades)'),
        array('label'=>'Listar Productos', 'url'=>array('/stock')),
	array('label'=>'Crear Producto', 'url'=>array('create')),
	array('label'=>'Tipo Productos', 'url'=>array('/stockTipoProducto')),
	array('label'=>'Listar Precios Asignados', 'url'=>array('/stockPrecios')),
);
?>

<h1>Stocks</h1>
Listado de Productos



<?php 
//echo $this->renderPartial('_buscarStock', array('model'=>$model));
 ?>

<?php $this->renderPartial('/varios/buscadorVario', array(),false);
$this->widget('ext.bootstrap.widgets.BootAlert',array(
    'id'=>'alert',
    'keys'=>array('success','info','warning','error'),
)); 
?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'stock-grid',
    'ajaxUpdate'=>false,
	'dataProvider'=>$model->stockReal(),
	'filter'=>$model,
	'columns'=>array(
	
//                'nombre',
                array(
                        'header'=>'Nombre',
                        'name'=>'nombre',
                        'filter'=>CHtml::textField('nombre',(isset($_GET['nombre']) ? $_GET['nombre'] : "")),
						'value'=>'CHtml::link($data->nombre,Yii::app()->createUrl("stock/update",array("id"=>$data->idStock)))',
                   		'type'=>'raw',
                ),
	array(
                  'name'=>'cantidadDisponible',
                    'type'=>'html',
                    'value'=>'$data->cantidadDisponible',
                ),
        array(
                        'header'=>'Tipo Producto',
                        'name'=>'Tipo Producto',
                        'filter'=>CHtml::textField('nombreTipoProducto',(isset($_GET['nombreTipoProducto']) ? $_GET['nombreTipoProducto'] : "")),
						'value'=>'$data->nombreTipoProducto',
                   		'type'=>'raw',
                ),
                 array(
                        'header'=>'Marca',
                        'name'=>'Marca',
                        'filter'=>CHtml::textField('nombreMarca',(isset($_GET['nombreMarca']) ? $_GET['nombreMarca'] : "")),
						'value'=>'$data->nombreMarca',
                   		'type'=>'raw',
                ),
               
                

		array(
                    'header'=>'$ LISTA',
                  'name'=>'precioLista',
                    'value'=>'"$ ".number_format ($data->precioLista, '.Settings::model()->getValorSistema('DECIMALES_FACTURAS').', ",", ".")',
                ),
  
        array(
            'header'=>'$ MIN',
                  'name'=>'precioMinimo',
                    'value'=>'"$ ".number_format ($data->precioMinimo, '.Settings::model()->getValorSistema('DECIMALES_FACTURAS').', ",", ".")',
                ),
            array(
                  'name'=>'importeSinIva',
                'header'=>'$ NETO',
                    'value'=>'"$ ".number_format ($data->importeSinIva, '.Settings::model()->getValorSistema('DECIMALES_FACTURAS').', ",", ".")',
                ),
       
        array(
			'class'=>'CButtonColumn','template' => '{carro}  {disponibilidad} {precio} {estadistica} ',
			'buttons' => array('estadistica' => array(
                    			'label'=>'Estadisitica de Ventas/Compras',
                    			'url'=>'Yii::app()->createUrl("stock/estadisticaProducto",array("idStock"=>$data->idStock))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/chart_curve.png',
                    
                            ),
                            'carro' => array(
                    			'label'=>'Agregar al Carro de compras',
                    			'url'=>'Yii::app()->createUrl("stock/stockReal",array("idStock"=>$data->idStock,"accion"=>"agregarCarro"))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/cart_add.png',
                    
                            ),
			'disponibilidad' => array(
                    			'label'=>'Disponibilidad',
                    			'url'=>'Yii::app()->createUrl("stockDisponible/create",array("idStock"=>$data->idStock,"disponibles"=>$data->cantidadDisponible))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/key.png',
                    
                            ),
                             'precio' => array(
                               
                    			'label'=>'Asignar precio al producto',     
                    			'url'=>'Yii::app()->createUrl("stockPreciosItems/create",array("precioCompra"=>$data->precioCompra,"idStock"=>$data->idStock,"minimo"=>$data->precioMinimo / (($data->porcentajeIva/100)+1),"lista"=>$data->importeSinIva,"porcentajeIva"=>$data->porcentajeIva))'   ,
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
