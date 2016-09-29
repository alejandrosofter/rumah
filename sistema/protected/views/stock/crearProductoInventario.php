<?php
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	'Nuevo de Inventario',
);

$this->menu=array(
	array('label'=>'Listar Productos de Inventario', 'url'=>array('/inventariosProductos/consultarProductos&idInventario='.$_GET['idInventario'])),
	array('label'=>'Nuevo Producto'),
	array('label'=>'Tipo de Productos', 'url'=>array('/stockTipoProducto')),
);
?>

<h1>Nuevo Producto desde Inventario</h1>

<?php echo $this->renderPartial('_formStockInventario', array('modelPrecio'=>$modelPrecio,'modelInventario'=>$modelInventario,'model'=>$model,'ultimoCargado'=>$ultimoCargado)); ?>