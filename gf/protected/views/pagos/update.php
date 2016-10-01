<?php
$this->breadcrumbs=array(
	'Pagos'=>array('index'),
	$model->idPago=>array('view','id'=>$model->idPago),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Pagos', 'url'=>array('index')),
	array('label'=>'Nuevo Pagos', 'url'=>array('create')),
	array('label'=>'Ver Pagos', 'url'=>array('view', 'id'=>$model->idPago)),
);
?>

<h1>Actualizar Pago <?php echo $model->idPago; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>