<?php
$this->breadcrumbs=array(
	'Pagos'=>array('/gastos'),'Nuevo Pago'
);

$this->menu=array(
	array('label'=>'Listar Pagos', 'url'=>array('index')),
	array('label'=>'Nuevo Pago'),
	array('label'=>'Listar Asignaciones de Factura', 'url'=>array('/gastosFactura')),
	array('label'=>'Ver Cuentas', 'url'=>array('/cuentasEfectivo')),
);
?>

<h1>Nuevo Pago</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>