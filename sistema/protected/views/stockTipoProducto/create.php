<?php
$this->breadcrumbs=array(
	'Stock'=>array('/stock'),'Tipo de Productos'=>array('/stockTipoProducto'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Tipo de Producto', 'url'=>array('index')),
);
?>

<h1>Nuevo Tipo de Producto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>