<?php
$this->breadcrumbs=array(
	'Recepcions'=>array('index'),
	$model->idRecepcion,
);

$this->menu=array(
	array('label'=>'List Recepcion', 'url'=>array('index')),
	array('label'=>'Create Recepcion', 'url'=>array('create')),
	array('label'=>'Update Recepcion', 'url'=>array('update', 'id'=>$model->idRecepcion)),
	array('label'=>'Delete Recepcion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idRecepcion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Recepcion', 'url'=>array('admin')),
);
?>

<h1>View Recepcion #<?php echo $model->idRecepcion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idRecepcion',
		'idCliente',
		'descripcionRecepcion',
		'fechaRecepcion',
		'tipoRecepcion',
		'idRecepcionPadre',
		'estadoRecepcion',
	),
)); ?>
