<?php
$this->breadcrumbs=array(
	'Formas De Pagos'=>array('index'),
	$model->idFormaPago=>array('view','id'=>$model->idFormaPago),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar FormasDePago', 'url'=>array('index')),
	array('label'=>'Nueva Formas De Pago', 'url'=>array('create')),

);
?>

<h1>Actualizar Formas De Pago <?php echo $model->idFormaPago; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>