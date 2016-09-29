<?php
$this->breadcrumbs=array(
	'Imputaciones Ordende Pago'=>array('index'),
	$model->idOrdenPagoVencimiento=>array('view','id'=>$model->idOrdenPagoVencimiento),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar OrdenesPagoVencimientos', 'url'=>array('index')),
	array('label'=>'Create OrdenesPagoVencimientos', 'url'=>array('create')),
	array('label'=>'View OrdenesPagoVencimientos', 'url'=>array('view', 'id'=>$model->idOrdenPagoVencimiento)),
	array('label'=>'Manage OrdenesPagoVencimientos', 'url'=>array('admin')),
);
?>

<h1>Update OrdenesPagoVencimientos <?php echo $model->idOrdenPagoVencimiento; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>