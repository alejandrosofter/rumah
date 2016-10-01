<?php
$this->breadcrumbs=array(
	'Facturas Entrantes Vencimientoses'=>array('index'),
	$model->idFacturaVencimiento=>array('view','id'=>$model->idFacturaVencimiento),
	'Actualizar',
);

//$this->menu=array(
//	array('label'=>'List FacturasEntrantesVencimientos', 'url'=>array('index')),
//	array('label'=>'Create FacturasEntrantesVencimientos', 'url'=>array('create')),
//	array('label'=>'View FacturasEntrantesVencimientos', 'url'=>array('view', 'id'=>$model->idFacturaVencimiento)),
//	array('label'=>'Manage FacturasEntrantesVencimientos', 'url'=>array('admin')),
//);
?>

<h1>Actualizar Facturas Entrantes Vencimientos <?php echo $model->idFacturaVencimiento; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>