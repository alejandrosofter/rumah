<?php
$this->breadcrumbs=array(
	'Facturas Salientes Corrientes'=>array('index'),
	$model->idFacturaSalienteCorriente,
);

$this->menu=array(
	array('label'=>'Listar Facturas Corriente', 'url'=>array('index')),
	array('label'=>'Nueva Factura Corriente', 'url'=>array('create')),
	array('label'=>'Actualizar Factura Corriente', 'url'=>array('update', 'id'=>$model->idFacturaSalienteCorriente)),
	array('label'=>'Quitar Factura Corriente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idFacturaSalienteCorriente),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Ver Factura Corriente #<?php echo $model->idFacturaSalienteCorriente; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idFacturaSalienteCorriente',
		'idFacturaSaliente',
		'fechaDesde',
		'fechaHasta',
		'estadoFactura',
		'comentario',
	),
)); ?>
