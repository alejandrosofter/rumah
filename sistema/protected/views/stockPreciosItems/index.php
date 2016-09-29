<?php
$this->breadcrumbs=array(
	'Centro de Productos'=>array('/stock/centroStock'),'Asignacion Precios'=>array('/stockPrecios'),
	'Productos'
);

?>

<h1>Productos de Asignación de Precio</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'stock-precios-items-grid',
	'dataProvider'=>$model->consultarProductos($_GET['idStockPrecio']),
	'filter'=>$model,
	'selectionChanged'=>'updateEditForm',
	
	'columns'=>array(

 array(
                        'header'=>'Nombre Stock',
                        'name'=>'nombreStock',
                        'filter'=>CHtml::textField('nombreStock',(isset($_GET['nombreStock']) ? $_GET['nombreStock'] : "")),
                        'value'=>'$data->nombreStock',
                		'type'=>'raw',
                ),
		
		'importePesosStock',
		'importePesosStockMin',
		array(
                  'name'=>'cantidadCompras',
                    'type'=>'html',
                    'value'=>'CHtml::link("ver compras (".$data->cantidadCompras.")",Yii::app()->createUrl("compras/consultarComprasProducto",array("idStock"=>$data->idStock)))',
                ),
      array(
			'class'=>'CButtonColumn','template' => '{update}',
			'buttons' => array(
                            'update' => array(
                    			'label'=>'Cambiar Precio',
                    			'url'=>'Yii::app()->createUrl("stockPreciosItems/update",array("porcentajeIva"=>$data->porcentajeIva,"id"=>$data->idStockPrecioStock, "stockPreciosItems_page"=>isset($_GET["stockPreciosItems_page"])?$_GET["stockPreciosItems_page"]:""))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/money_add.png',
                    
                            ),
                            ),
		),
		
	),
)); ?>
