<?php
$this->breadcrumbs=array(
	'Pagos Facturas'=>array('/pagos'),
	'Pago asentado',
);

$this->menu=array(
	array('label'=>'Listar Pagos', 'url'=>array('/pagos/index')),
	array('label'=>'Nuevo Pago', 'url'=>array('/pagos/create')),
	array('label'=>'Facturas', 'url'=>array('/facturasSalientes/')),
	array('label'=>'Facturas para cobrar', 'url'=>array('/facturasSalientes/buscarEstado&estado=Para Pagar')),
	
	
	
);
?>

<h1>Pago Asentado</h1>
Se ha asentado el pago de la factura. Para mas acciones haga click en el menu de acciones en parte superior derecha.
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idFacturaSaliente',
		'idPago',
		'estadoPagoFactura',
	),
)); ?>
