<?php
$this->breadcrumbs=array(
	'Listas de Precios'=>array('/stock/centroStock'),'Nueva Lista de Precios'
);

$this->menu=array(
	array('label'=>'Listar Listas de Precios','url'=>array('/stockPrecios/index')),
	array('label'=>'Nueva por COMPRAS','url'=>array('/stockPrecios/create&tipo=compra')),
	array('label'=>'Nueva por INVENTARIO','url'=>array('/stockPrecios/create&tipo=inventario')),
	array('label'=>'Nueva por TIPO DE PRODUCTO','url'=>array('/stockPrecios/create&tipo=porTipo')),
	array('label'=>'Nueva por SERVICIO','url'=>array('/stockPrecios/create&tipo=servicios')),
);
?>

<h1>Nueva Lista</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>