<?php
$this->breadcrumbs=array(
	'Stock'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Stock', 'url'=>array('index')),
	array('label'=>'Crear Stock'),
	array('label'=>'Tipo Productos', 'url'=>array('/stockTipoProducto')),
);
?>

<h1>Crear Componente desde nuevo Stock</h1>

<?php echo $this->renderPartial('/stock/_form', array('model'=>$model)); ?>