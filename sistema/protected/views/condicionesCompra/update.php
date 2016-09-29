<?php
$this->breadcrumbs=array(
	'Condiciones de Compra'=>array('index'),
	$model->idCondicionCompra=>array('view','id'=>$model->idCondicionCompra),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Condiciones de Compra', 'url'=>array('index')),
	array('label'=>'Nueva Condicion de Compra', 'url'=>array('create')),
	array('label'=>'Ver Condicion de Compra', 'url'=>array('view', 'id'=>$model->idCondicionCompra)),
);
?>

<h1>Update Condiciones de Compra <?php echo $model->idCondicionCompra; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>