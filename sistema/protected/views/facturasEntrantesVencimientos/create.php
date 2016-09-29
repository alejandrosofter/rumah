<?php
$this->breadcrumbs=array(
	'Facturas Entrantes Vencimientoses'=>array('index'),
	'Crear',
);

$this->menu=array(
//	array('label'=>'List FacturasEntrantesVencimientos', 'url'=>array('index')),
//	array('label'=>'Manage FacturasEntrantesVencimientos', 'url'=>array('admin')),
);
?>

<h1>Crear un vencimiento</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>