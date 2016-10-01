<?php
$this->breadcrumbs=array(
	'Punto Ventas'=>array('index'),
	$model->idPuntoVenta,
);

$this->menu=array(
	array('label'=>'Ver Puntos de Venta', 'url'=>array('index')),
	array('label'=>'Crear Punto Venta', 'url'=>array('create')),
	array('label'=>'Actualizar Punto Venta', 'url'=>array('update', 'id'=>$model->idPuntoVenta)),
	array('label'=>'Eliminar Punto Venta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idPuntoVenta),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>Ver Punto de Venta #<?php echo $model->idPuntoVenta; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idPuntoVenta',
		'nombrePuntoVenta',
		'descripcionPuntoVenta',
		'electronica',
	),
)); ?>
