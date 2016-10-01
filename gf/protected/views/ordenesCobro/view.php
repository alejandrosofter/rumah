<?php
$this->breadcrumbs=array(
	'Ordenes de Cobro'=>array('index'),
	$model->idOrdenCobro,
);

$this->menu=array(
	array('label'=>'Listar Ordenes de Cobro', 'url'=>array('index')),
	array('label'=>'Crear Orden de Cobro', 'url'=>array('create')),
	array('label'=>'Actualizar Orden de Cobro', 'url'=>array('update', 'id'=>$model->idOrdenCobro)),
	array('label'=>'Eliminar Orden de Cobro', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idOrdenCobro),'confirm'=>'Esta seguro de eliminar esta orden?')),
);
?>

<h1>Ver OrdenesCobro #<?php echo $model->idOrdenCobro; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idOrdenCobro',
		'fechaOrdenCobro',
		'idCliente',
		'importeAcuenta',
	),
)); ?>
