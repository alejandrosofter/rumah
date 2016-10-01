<?php
$this->breadcrumbs=array(
	'Centro de Stock'=>array('/stock/centroStock'),'Inventarios'=>array('/inventarios'),
	'Listado de Inventarios'
);

$this->menu=array(
array('label'=>'Listado de Inventarios'),
	array('label'=>'Nuevo Inventario', 'url'=>array('create')),
	
);
?>

<h1>Inventarios</h1>
Tenga en cuenta el inventario que esta de forma PREDETERMINADA va a ser el que cuente en STOCK REAL.
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'inventarios-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'fechaInventario',
		array(
                  'name'=>'fechaInventario',
                    'type'=>'html',
                    'value'=>'($data->fechaInventario=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fechaInventario)'
		),
		'descripcionInventario',
	
		array(
                  'name'=>'esPredeterminado',
                    'type'=>'html',
                    'value'=>'($data->esPredeterminado)?"si":"no"',
                ),
        array(
                  'name'=>'cantidadProductos',
                    'type'=>'html',
                    'value'=>'CHtml::link("Productos (".$data->cantidadProductos.")",Yii::app()->createUrl("inventariosProductos/consultarProductos",array("idInventario"=>$data->idInventario)))',
                ),
		array(
			'class'=>'CButtonColumn','template' => '{aplicarPrecios} {aplicarStock} {productos} {imprime} {update} {delete}',
			'buttons' => array(
                            'productos' => array(
                    			'label'=>'Agregar Productos',
                    			'url'=>'Yii::app()->createUrl("InventariosProductos/create",array("idInventario"=>$data->idInventario))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/add.png',
                    
                            ),
                            'aplicarStock' => array(
                    			'label'=>'Aplicar a Stock',
                    			'url'=>'Yii::app()->createUrl("stock/aplicarStockInventario",array("idInventario"=>$data->idInventario))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/connect.png',
                    
                            ),
                            'aplicarPrecios' => array(
                    			'label'=>'Aplicar Precios',
                    			'url'=>'Yii::app()->createUrl("stock/aplicarPreciosInventario",array("idInventario"=>$data->idInventario))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/money.png',
                    
                            ),
                            'imprime' => array(
                    			'label'=>'Imprimir Estado de Inventario',
                    			'url'=>'Yii::app()->createUrl("inventarios/imprimeEstado",array("idInventario"=>$data->idInventario))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/printer.png',
                    
                            ),
                            ),
		),
	),
)); ?>
