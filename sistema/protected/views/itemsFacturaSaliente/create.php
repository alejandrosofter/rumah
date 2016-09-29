<?php
$this->breadcrumbs=array(
	'Facturas de Venta'=>array('/facturasSalientes'),
	'Items Factura',
);

$this->menu=array(
	array('label'=>'Listar Items', 'url'=>array('/itemsFacturaSaliente/index&idFacturaSaliente='.$idFactura)),
	array('label'=>'Pagar esta Factura', 'url'=>array('/pagos/create&idFactura='.$idFactura.'&idCliente=0')),
);
?>

<h1>Nuevo Item de Factura</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>