<?php
$this->breadcrumbs=array(
	'Facturas Salientes Corrientes'=>array('index'),
	$model->idFacturaSalienteCorriente=>array('view','id'=>$model->idFacturaSalienteCorriente),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Facturas Corriente', 'url'=>array('index')),
	array('label'=>'Nueva Factura Corriente', 'url'=>array('create')),
	array('label'=>'Ver Factura Corriente', 'url'=>array('view', 'id'=>$model->idFacturaSalienteCorriente)),
);
?>

<h1>Actualizar Factura Corriente <?php echo $model->idFacturaSalienteCorriente; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>