<?php
$this->breadcrumbs=array(
	'Facturas Entrantes Corrientes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FacturasEntrantesCorriente', 'url'=>array('index')),
	array('label'=>'Manage FacturasEntrantesCorriente', 'url'=>array('admin')),
);
?>

<h1>Create FacturasEntrantesCorriente</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>