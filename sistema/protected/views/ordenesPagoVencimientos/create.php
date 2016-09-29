<?php
$this->breadcrumbs=array(
	'Pagos'=>array('/ordenesPago'),
	'Nueva Liquidacion',
);

$this->menu=array(

);
?>

<h1>Liquidar Factura</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>