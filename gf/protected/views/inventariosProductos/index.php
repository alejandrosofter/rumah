<?php
$this->breadcrumbs=array(
	'Centro de Stock'=>array('/stock/centroStock'),'Inventarios'=>array('/inventarios'),'Productos Inventario'=>array('/inventariosProductos'),
	'Listado de Productos de inventarios'
);

$this->menu=array(
	array('label'=>'Listar Productos Inventario', 'url'=>array('index')),
	array('label'=>'Producto de Inventario', 'url'=>array('create')),
);
?>
<h1>Listado Productos Inventario</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
