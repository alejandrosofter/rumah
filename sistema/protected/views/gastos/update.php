<?php
$this->breadcrumbs=array(
	'Pagos'=>array('index'),
	$model->idGasto=>array('view','id'=>$model->idGasto),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Pagos', 'url'=>array('index')),
	array('label'=>'Nuevo Pago', 'url'=>array('create')),
	array('label'=>'Actualizar Gasto'),
	array('label'=>'Listar Asignaciones de Factura', 'url'=>array('/gastosFactura')),
	array('label'=>'Ver Pago', 'url'=>array('view', 'id'=>$model->idGasto)),
);
?>

<h1>Actualizar Pago <?php echo $model->idGasto; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>