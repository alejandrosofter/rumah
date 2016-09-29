<?php
$this->breadcrumbs=array(
	'Condiciones Venta Items'=>array('index'),
	$model->idCondicionVentaItem,
);

$this->menu=array(
	array('label'=>'Listar Condicion de Venta Items', 'url'=>array('index')),
	array('label'=>'Crear Condicion de Venta Items', 'url'=>array('index')),
	array('label'=>'Actualizar Condicion de Venta Items', 'url'=>array('update', 'id'=>$model->idCondicionVentaItem)),
	array('label'=>'Eliminar Condicion de Venta Items', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idCondicionVentaItem),'confirm'=>'Esta seguro de eliminar la condicion de venta Item?')),
	
);
?>

<h1>Ver Condicion de Venta Items #<?php echo $model->idCondicionVentaItem; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idCondicionVentaItem',
		'idCondicionVenta',
		'porcentajeTotalFacturado',
		'cantidadCuotas',
		'aVencerEnDias',
		'CantidadDiasMesesCuotas',
		'porcentajeInteres',
		'fechaVencimiento',
		'calculo',
	),
)); ?>
