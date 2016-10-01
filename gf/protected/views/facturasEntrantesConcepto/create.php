<?php
$this->breadcrumbs=array(
	'Conceptos de Factura'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Ir a Conceptos de Factura', 'url'=>array('/facturasEntrantesConcepto/consultarPorFactura&idFactura='.$idFactura)),
	array('label'=>'Ver Conceptos', 'url'=>array('/conceptos')),
	array('label'=>'Nuevo Concepto', 'url'=>array('/conceptos/create')),
);
?>

<h1>Nuevo Concepto de Factura</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>