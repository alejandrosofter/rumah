<?php
$this->breadcrumbs=array(
	'Centro de Compras'=>array('/facturasEntrantes/facturas'),'Compras'=>array('/compras'),
	'Listado de Compras',
);

$this->menu=array(
	array('label'=>'Listar Compras'),
	array('label'=>'Nueva Compra', 'url'=>array('create')),
);
?>

<h1>Compras</h1>
Listado de compras realizadas
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'compras-grid',
	'dataProvider'=>$model->search(),
	
	'columns'=>array(

array(
			'class'=>'CButtonColumn','template' => '{factura}',
			'buttons' => array(
			'factura' => array(
                    			'label'=>'Factura',
                    			'url'=>'Yii::app()->createUrl("facturasEntrantes/update",array("id"=>$data->idFacturaEntrante))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/script.png',
                    
                            ),
                            ),
		),
		array(
                  'name'=>'fechaCompra',
                    'type'=>'html',
                    'value'=>'($data->fechaCompra=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fechaCompra);',
                ),
		
	
		array(
                  'name'=>'cantidadProductos',
                    'type'=>'html',
                    'value'=>'CHtml::link("Productos (".$data->cantidadProductos.")",Yii::app()->createUrl("comprasItems/productos",array("idCompra"=>$data->idCompra)))',
                ),
		array(
			'class'=>'CButtonColumn','template' => '{precios} {view} {update} {delete}',
			'buttons' => array(
			 'precios' => array(
                    			'label'=>'Aplicar Precios',
                    			'url'=>'Yii::app()->createUrl("stock/aplicarPreciosCompra",array("idCompra"=>$data->idCompra))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/money.png',
                    
                            ),
                          
                            ),
		),
	),
)); ?>
