<?php
$this->breadcrumbs=array(
	'Stock'=>array('/stock'),'Tipo de Productos'=>array('/stockTipoProducto'),
	'Tipo de Productos'
);

$this->menu=array(
	array('label'=>'Nuevo Tipo de Producto', 'url'=>array('create')),
);
?>

<h1>Tipos de Producto</h1>
Listado de tipos de Productos
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'stock-tipo-producto-grid',
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
		
		'porcentajeGananciaMin',
		'porcentajeGananciaLista',
		
		array(
			'class'=>'CButtonColumn','template' => '{aplicarPrecios} {view} {update} {delete}',
			'buttons' => array(
                            'aplicarPrecios' => array(
                    			'label'=>'Aplicar Precios',
                    			'url'=>'Yii::app()->createUrl("stock/aplicarPreciosCategoria",array("idTipoProducto"=>$data->idStockTipo))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/money.png',
                    
                            ),
                            ),
		),
	),
)); ?>
