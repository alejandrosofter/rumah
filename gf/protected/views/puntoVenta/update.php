<?php
$this->breadcrumbs=array(
	'Punto Ventas'=>array('index'),
	$model->idPuntoVenta=>array('view','id'=>$model->idPuntoVenta),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Puntos de Venta', 'url'=>array('index')),
	array('label'=>'Nuevo Punto de Venta', 'url'=>array('create')),
	array('label'=>'Ver Punto de Venta', 'url'=>array('view', 'id'=>$model->idPuntoVenta)),
	
);
?>

<h1>Actualizar Punto de Venta <?php echo $model->idPuntoVenta; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>