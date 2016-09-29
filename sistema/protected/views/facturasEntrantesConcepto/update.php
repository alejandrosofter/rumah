<?php
$this->breadcrumbs=array(
	'Conceptos de Facturas de Compra'=>array('index'),
	$model->idFacturaConcepto=>array('view','id'=>$model->idFacturaConcepto),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Conceptos de Factura', 'url'=>array('index')),
	array('label'=>'Nuevo Listar Conceptos de Factura', 'url'=>array('create')),
);
?>

<h1>Actualizar Conceptos de Factura <?php echo $model->idFacturaConcepto; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>