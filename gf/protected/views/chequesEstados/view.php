<?php
$this->breadcrumbs=array(
	'Cheques Estadoses'=>array('index'),
	$model->idEstadoCheque,
);

$this->menu=array(
	array('label'=>'List ChequesEstados', 'url'=>array('index')),
	array('label'=>'Create ChequesEstados', 'url'=>array('create')),
	array('label'=>'Update ChequesEstados', 'url'=>array('update', 'id'=>$model->idEstadoCheque)),
	array('label'=>'Delete ChequesEstados', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idEstadoCheque),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ChequesEstados', 'url'=>array('admin')),
);
?>

<h1>View ChequesEstados #<?php echo $model->idEstadoCheque; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idEstadoCheque',
		'idCheque',
		'fecha',
		'nombreEstado',
	),
)); ?>
