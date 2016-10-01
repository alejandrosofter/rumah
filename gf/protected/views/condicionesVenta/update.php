<?php
$this->breadcrumbs=array(
	'Condiciones Ventas'=>array('index'),
	$model->idCondicionVenta=>array('view','id'=>$model->idCondicionVenta),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Condiciones de Venta', 'url'=>array('index')),
	array('label'=>'Crear Condicion de Venta', 'url'=>array('create')),
	array('label'=>'Ver Condicion de Venta', 'url'=>array('view', 'id'=>$model->idCondicionVenta)),
	
);
?>

<h1>Modificar Condicion de Venta <?php echo $model->idCondicionVenta; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>