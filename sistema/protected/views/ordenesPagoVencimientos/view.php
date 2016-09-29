<?php
$this->breadcrumbs=array(
	'Ordenes Pago Vencimientoses'=>array('index'),
	$model->idOrdenPagoVencimiento,
);

$this->menu=array(
	array('label'=>'List OrdenesPagoVencimientos', 'url'=>array('index')),
	array('label'=>'Create OrdenesPagoVencimientos', 'url'=>array('create')),
	array('label'=>'Update OrdenesPagoVencimientos', 'url'=>array('update', 'id'=>$model->idOrdenPagoVencimiento)),
	array('label'=>'Delete OrdenesPagoVencimientos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idOrdenPagoVencimiento),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrdenesPagoVencimientos', 'url'=>array('admin')),
);
?>

<h1>View OrdenesPagoVencimientos #<?php echo $model->idOrdenPagoVencimiento; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idOrdenPagoVencimiento',
		'idFacturaEntrante',
		'idFacturaEntranteVencimiento',
		'importe',
	),
)); ?>
