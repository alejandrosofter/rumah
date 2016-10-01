<?php
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Stock', 'url'=>array('stockReal')),
	array('label'=>'Nuevo Producto'),
	array('label'=>'Tipo de Productos', 'url'=>array('/stockTipoProducto')),
);
?>

<h1>Nuevo Producto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'ultimoCargado'=>$ultimoCargado)); ?>