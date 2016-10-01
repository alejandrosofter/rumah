<?php
$this->breadcrumbs=array(
	'Pagos Facturas'=>array('index'),
	$model->idPagoFactura=>array('view','id'=>$model->idPagoFactura),
	'Update',
);

$this->menu=array(
	array('label'=>'List PagosFactura', 'url'=>array('index')),
	array('label'=>'Create PagosFactura', 'url'=>array('create')),
	array('label'=>'View PagosFactura', 'url'=>array('view', 'id'=>$model->idPagoFactura)),
	array('label'=>'Manage PagosFactura', 'url'=>array('admin')),
);
?>

<h1>Update PagosFactura <?php echo $model->idPagoFactura; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>