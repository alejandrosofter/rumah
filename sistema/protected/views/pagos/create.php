<?php
$this->breadcrumbs=array(
	'Facturas de Venta'=>array('/facturasSalientes'),
	'Pagos de Factura'=>array('/pagos'),
	'Nuevo Pago'
);

$this->menu=array(
	array('label'=>'Listar Pagos', 'url'=>array('consultarPagosFactura&idFacturaSaliente='.$idFacturaSaliente)),
	array('label'=>'Nuevo Pago'),
);
?>

<h1>Nuevo Pago</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>