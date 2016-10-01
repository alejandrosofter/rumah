<?php
$this->breadcrumbs=array(
	'Facturas Ordenes Trabajos'=>array('index'),
	$model->idFacturaOrden=>array('view','id'=>$model->idFacturaOrden),
	'Update',
);

$this->menu=array(
	array('label'=>'List FacturasOrdenesTrabajo', 'url'=>array('index')),
	array('label'=>'Create FacturasOrdenesTrabajo', 'url'=>array('create')),
	array('label'=>'View FacturasOrdenesTrabajo', 'url'=>array('view', 'id'=>$model->idFacturaOrden)),
	array('label'=>'Manage FacturasOrdenesTrabajo', 'url'=>array('admin')),
);
?>

<h1>Update FacturasOrdenesTrabajo <?php echo $model->idFacturaOrden; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>