<?php
$this->breadcrumbs=array(
	'Centro de Compras'=>array('/facturasEntrantes/facturas'),'Compras'=>array('/compras'),
	'Agregar Producto',
);

$this->menu=array(
	array('label'=>'Nuevo Producto'),
	array('label'=>'Listar Productos', 'url'=>array('index&idFactura='.$idFactura)),
);
?>

<h1>Agregar Producto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>