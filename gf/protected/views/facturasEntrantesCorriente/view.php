<?php
$this->breadcrumbs=array(
	'Facturas Entrantes Corrientes'=>array('index'),
	$model->idFacturaEntranteCorriente,
);

$this->menu=array(
	array('label'=>'List FacturasEntrantesCorriente', 'url'=>array('index')),
	array('label'=>'Create FacturasEntrantesCorriente', 'url'=>array('create')),
	array('label'=>'Update FacturasEntrantesCorriente', 'url'=>array('update', 'id'=>$model->idFacturaEntranteCorriente)),
	array('label'=>'Delete FacturasEntrantesCorriente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idFacturaEntranteCorriente),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FacturasEntrantesCorriente', 'url'=>array('admin')),
);
?>

<h1>View FacturasEntrantesCorriente #<?php echo $model->idFacturaEntranteCorriente; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idFacturaEntranteCorriente',
		'idFacturaEntrante',
		'fechaDesde',
		'fechaHasta',
		'estadoFactura',
		'comentario',
	),
)); ?>
