<?php
$this->breadcrumbs=array(
	'Centro de Productos'=>array('/stock/centroStock'),'Asignacion Precios'=>array('/stockPrecios'),
	'Productos de Compra'
);

$this->menu=array(
	array('label'=>'Listado de Productos', 'url'=>array('index')),
	array('label'=>'Nuevo Producto', 'url'=>array('create&idStockPrecio='.$idStockPrecio)),
);
?>

<h1>Productos de Asignación de Precio</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'stock-precios-items-grid',
	'dataProvider'=>$model,
	'columns'=>array(
		'nombreStock',
		'importePesosStock',
		'importePesosStockMin',
		'importeDolarStock',
		
	),
)); ?>