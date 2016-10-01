<?php
$this->breadcrumbs=array(
	'Facturas Venta Vencimientos'=>array('index'),
	$model->idFacturaVencimiento=>array('view','id'=>$model->idFacturaVencimiento),
	'Actualizar',
);

//$this->menu=array(
//	array('label'=>'Listar Vencimientos de Factura Venta', 'url'=>array('index')),
//	array('label'=>'Crear Vencimientos de Factura Venta', 'url'=>array('create')),
//	array('label'=>'Ver Vencimientos de Factura Venta', 'url'=>array('view', 'id'=>$model->idFacturaVencimiento)),
//	
//);
?>

<h1>Actualizar Vencimientos de Factura Venta <?php echo $model->idFacturaVencimiento; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>