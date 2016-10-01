<?php
$this->breadcrumbs=array(
	'Facturas Salientes Respuesta Electronicas'=>array('index'),
	$model->idFacturaRespuesta,
);

$this->menu=array(
	array('label'=>'List FacturasSalientesRespuestaElectronica', 'url'=>array('index')),
	array('label'=>'Create FacturasSalientesRespuestaElectronica', 'url'=>array('create')),
	array('label'=>'Update FacturasSalientesRespuestaElectronica', 'url'=>array('update', 'id'=>$model->idFacturaRespuesta)),
	array('label'=>'Delete FacturasSalientesRespuestaElectronica', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idFacturaRespuesta),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FacturasSalientesRespuestaElectronica', 'url'=>array('admin')),
);
?>

<h1>View FacturasSalientesRespuestaElectronica #<?php echo $model->idFacturaRespuesta; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idFacturaRespuesta',
		'idFacturaSaliente',
		'estado',
		'cae',
		'fechaVence',
		'eventos',
		'errores',
	),
)); ?>
