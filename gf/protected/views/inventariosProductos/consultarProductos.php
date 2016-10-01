<?php
$this->breadcrumbs=array(
	'Centro de Stock'=>array('/stock/centroStock'),'Inventarios'=>array('/inventarios'),'Productos Inventario'=>array('/inventariosProductos/consultarProductos&idInventario='.$idInventario),
	'Listado de Productos de inventario'
);

$this->menu=array(
	array('label'=>'Listar Productos Inventario'),
        array('label'=>'Volver a Inventarios', 'url'=>array('/inventarios')),
	array('label'=>'Agregar Producto', 'url'=>array('create&idInventario='.$idInventario)),
        array('label'=>'Agregar Producto Completo', 'url'=>array('/stock/createDeInventario&idInventario='.$idInventario)),
);
?>
<h1>Listado Productos Inventario</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'inventarios-productos-grid',
	'dataProvider'=>$model,
        'filter'=>$modelo,
	'columns'=>array(

		'fechaProductoInventario',
		 array(
                  'name'=>'nombreStock',
                    'type'=>'html',
                     'filter'=>CHtml::textField('idStock',(isset($_GET['idStock']) ? $_GET['idStock'] : "")),
                    'value'=>'$data->nombreStock',
                ),
		'cantidadInventario',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
