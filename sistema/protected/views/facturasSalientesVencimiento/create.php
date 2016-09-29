<?php
$this->breadcrumbs=array(
	'Facturas Salientes Vencimientos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Vencimientos de Factura Venta', 'url'=>array('index')),
	
);
?>

<h1>Crear FacturasSalientesVencimiento</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>