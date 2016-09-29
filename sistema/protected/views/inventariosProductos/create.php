<?php
$this->breadcrumbs=array(
	'Centro de Stock'=>array('/stock/centroStock'),'Inventarios'=>array('/inventarios'),'Productos Inventario'=>array('/inventariosProductos/consultarProductos&idInventario='.$idInventario),
	'Nuevo Producto de Inventario'
);

$this->menu=array(
	array('label'=>'Listar Productos Inventario', 'url'=>array('consultarProductos&idInventario='.$model->idInventario)),
	array('label'=>'Producto de Inventario'),
);
?>

<h1>Nuevo Producto de Inventario</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'modelPrecio'=>$modelPrecio)); ?>