<?php
$this->breadcrumbs=array(
	'Facturas Entrantes Corrientes'=>array('index'),
	$model->idFacturaEntranteCorriente=>array('view','id'=>$model->idFacturaEntranteCorriente),
	'Update',
);

$this->menu=array(
	array('label'=>'List FacturasEntrantesCorriente', 'url'=>array('index')),
	array('label'=>'Create FacturasEntrantesCorriente', 'url'=>array('create')),
	array('label'=>'View FacturasEntrantesCorriente', 'url'=>array('view', 'id'=>$model->idFacturaEntranteCorriente)),
	array('label'=>'Manage FacturasEntrantesCorriente', 'url'=>array('admin')),
);
?>

<h1>Update FacturasEntrantesCorriente <?php echo $model->idFacturaEntranteCorriente; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>