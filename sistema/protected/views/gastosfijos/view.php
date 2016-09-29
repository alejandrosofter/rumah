<?php
$this->breadcrumbs=array(
	'Gastosfijoses'=>array('index'),
	$model->idGastoFijo,
);

$this->menu=array(
	array('label'=>'List Gastosfijos', 'url'=>array('index')),
	array('label'=>'Create Gastosfijos', 'url'=>array('create')),
	array('label'=>'Update Gastosfijos', 'url'=>array('update', 'id'=>$model->idGastoFijo)),
	array('label'=>'Delete Gastosfijos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idGastoFijo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Gastosfijos', 'url'=>array('admin')),
);
?>

<h1>View Gastosfijos #<?php echo $model->idGastoFijo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idGastoFijo',
		'importe',
		'detalle',
		'idProveedor',
		'periodicidadMeses',
		'esVariable',
		'numeroDiaVence',
		'fechaComienzo',
	),
)); ?>
