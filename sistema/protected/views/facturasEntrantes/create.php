<?php
$this->breadcrumbs=array(
	'Centro de Compras'=>array('/facturasEntrantes/facturas'),'Nueva Factura de Compra'
);
$this->put='puttt';

?>

<h1>Nueva Factura</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

