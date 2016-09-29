<?php
$this->breadcrumbs=array(
	'Facturas Entrantes Vencimientoses'=>array('index'),
	$model->idFacturaVencimiento,
);

$this->menu=array(
	array('label'=>'List FacturasEntrantesVencimientos', 'url'=>array('index')),
	array('label'=>'Create FacturasEntrantesVencimientos', 'url'=>array('create')),
	array('label'=>'Update FacturasEntrantesVencimientos', 'url'=>array('update', 'id'=>$model->idFacturaVencimiento)),
	array('label'=>'Delete FacturasEntrantesVencimientos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idFacturaVencimiento),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FacturasEntrantesVencimientos', 'url'=>array('admin')),
);
?>

<h1>View FacturasEntrantesVencimientos #<?php echo $model->idFacturaVencimiento; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idFacturaVencimiento',
		'idFacturaEntrante',
		'fechaVencimiento',
		'estado',
		'importe',
	),
)); ?>
