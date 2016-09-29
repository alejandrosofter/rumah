<?php
$this->breadcrumbs=array(
	'Condiciones Ventas'=>array('index'),
	$model->idCondicionVenta,
);

$this->menu=array(
	array('label'=>'Listar Condiciones de Venta', 'url'=>array('index')),
	array('label'=>'Crear Condicion de Venta', 'url'=>array('create')),
	array('label'=>'Actualizar Condicion de Venta', 'url'=>array('update', 'id'=>$model->idCondicionVenta)),
	array('label'=>'Eliminar Condicion de Venta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idCondicionVenta),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>Ver Condicion de Venta #<?php echo $model->idCondicionVenta; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idCondicionVenta',
		'descripcionVenta',
		'generaFacturaCredito',
	),
)); ?>
