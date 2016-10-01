<?php
$this->breadcrumbs=array(
	'Gastos Facturas'=>array('index'),
	$model->idGastoFactura=>array('view','id'=>$model->idGastoFactura),
	'Update',
);

$this->menu=array(
	array('label'=>'List GastosFactura', 'url'=>array('index')),
	array('label'=>'Create GastosFactura', 'url'=>array('create')),
	array('label'=>'View GastosFactura', 'url'=>array('view', 'id'=>$model->idGastoFactura)),
	array('label'=>'Manage GastosFactura', 'url'=>array('admin')),
);
?>

<h1>Update GastosFactura <?php echo $model->idGastoFactura; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>