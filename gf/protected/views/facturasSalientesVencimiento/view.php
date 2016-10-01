<?php
$this->breadcrumbs=array(
	'Facturas Venta Vencimientos'=>array('index'),
	$model->idFacturaVencimiento,
);

$this->menu=array(
	array('label'=>'Listar Vencimientos de Factura Venta', 'url'=>array('index')),
	array('label'=>'Crear Vencimientos de Factura Venta ', 'url'=>array('create')),
	array('label'=>'Actualizar Vencimientos de Factura Venta', 'url'=>array('update', 'id'=>$model->idFacturaVencimiento)),
	array('label'=>'Eliminar Vencimientos de Factura Venta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idFacturaVencimiento),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>Ver Vencimientos de Factura Venta #<?php echo $model->idFacturaVencimiento; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idFacturaVencimiento',
		'idFacturaSaliente',
		'fechaVencimiento',
		'estado',
		'importeFacturaSaliente',
	),
)); ?>
