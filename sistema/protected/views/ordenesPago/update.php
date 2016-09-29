<?php
$this->breadcrumbs=array(
	'Ordenes de Pago'=>array('index'),
	$model->idOrdenPago=>array('view','id'=>$model->idOrdenPago),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Ordenes de Pago', 'url'=>array('index')),
	array('label'=>'Nueva Ordene de Pago', 'url'=>array('create')),
);
?>

<h1>Actualizar Ordenen de Pago <?php echo $model->idOrdenPago; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>