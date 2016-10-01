<?php
$this->breadcrumbs=array(
	'Movimientoses'=>array('index'),
	$model->idMovimiento,
);

$this->menu=array(
	array('label'=>'List Movimientos', 'url'=>array('index')),
	array('label'=>'Create Movimientos', 'url'=>array('create')),
	array('label'=>'Update Movimientos', 'url'=>array('update', 'id'=>$model->idMovimiento)),
	array('label'=>'Delete Movimientos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idMovimiento),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Movimientos', 'url'=>array('admin')),
);
?>

<h1>View Movimientos #<?php echo $model->idMovimiento; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idMovimiento',
		'idUsuario',
		'fecha',
		'tipoMovimiento',
		'tabla',
		'idElemento',
	),
)); ?>
