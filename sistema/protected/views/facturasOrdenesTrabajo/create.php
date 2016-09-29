<?php
$this->breadcrumbs=array(
	'Facturas Ordenes Trabajos'=>array('index'),
	'Facturar Orden',
);

$this->menu=array(
	array('label'=>'Listar Ordenes', 'url'=>array('/ordenesTrabajo')),
	array('label'=>'Facturas', 'url'=>array('/facturasSalientes')),
);
?>

<h1>Facturar Orden de Fact. Existente</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>