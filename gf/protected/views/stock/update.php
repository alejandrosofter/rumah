<?php
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model->idStock=>array('view','id'=>$model->idStock),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Productos', 'url'=>array('index')),
	array('label'=>'Crear Producto', 'url'=>array('create')),
	array('label'=>'Actualizar Producto'),
	array('label'=>'Listas de Precios', 'url'=>array('/stockPrecios')),
);
?>

<h1>Actualizar Producto <?php echo $model->idStock; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>