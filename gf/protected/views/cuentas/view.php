<?php
$this->breadcrumbs=array(
	'Cuentases'=>array('index'),
	$model->idCuenta,
);

$this->menu=array(
	array('label'=>'List Cuentas', 'url'=>array('index')),
	array('label'=>'Create Cuentas', 'url'=>array('create')),
	array('label'=>'Update Cuentas', 'url'=>array('update', 'id'=>$model->idCuenta)),
	array('label'=>'Delete Cuentas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idCuenta),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cuentas', 'url'=>array('admin')),
);
?>

<h1>View Cuentas #<?php echo $model->idCuenta; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idCuenta',
		'nombre',
		'idCentroCosto',
	),
)); ?>
