<?php
$this->breadcrumbs=array(
	'Centro de Ventas'=>array('centroVentas'),'Facturas de Venta'=>array('index'),
	'Nueva Factura'
);


?>

<h1>Nueva Factura</h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>