<?php
$this->breadcrumbs=array(
	'Facturas Ordenes Trabajos'=>array('index'),
	$model->idFacturaOrden,
);

$this->menu=array(
	array('label'=>'List FacturasOrdenesTrabajo', 'url'=>array('index')),
	array('label'=>'Create FacturasOrdenesTrabajo', 'url'=>array('create')),
	array('label'=>'Update FacturasOrdenesTrabajo', 'url'=>array('update', 'id'=>$model->idFacturaOrden)),
	array('label'=>'Delete FacturasOrdenesTrabajo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idFacturaOrden),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FacturasOrdenesTrabajo', 'url'=>array('admin')),
);
?>

<h1>View FacturasOrdenesTrabajo #<?php echo $model->idFacturaOrden; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idFacturaOrden',
		'idFacturaSaliente',
		'idOrdenTrabajo',
		'fecha',
	),
)); ?>
