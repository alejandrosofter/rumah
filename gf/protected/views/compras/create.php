<?php
$this->breadcrumbs=array(
	'Centro de Compras'=>array('/facturasEntrantes/facturas'),'Compras'=>array('/compras'),
	'Nueva Compra',
);

$this->menu=array(
	array('label'=>'Listar Compras', 'url'=>array('index')),
	array('label'=>'Crear Compras'),
);
?>

<h1>Crear Compra</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>