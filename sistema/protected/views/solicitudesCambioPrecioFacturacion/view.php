<?php
$this->breadcrumbs=array(
	'Solicitudes Cambio Precio Facturacions'=>array('index'),
	$model->idSolicitudPrecio,
);

$this->menu=array(
	array('label'=>'List SolicitudesCambioPrecioFacturacion', 'url'=>array('index')),
	array('label'=>'Create SolicitudesCambioPrecioFacturacion', 'url'=>array('create')),
	array('label'=>'Update SolicitudesCambioPrecioFacturacion', 'url'=>array('update', 'id'=>$model->idSolicitudPrecio)),
	array('label'=>'Delete SolicitudesCambioPrecioFacturacion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idSolicitudPrecio),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SolicitudesCambioPrecioFacturacion', 'url'=>array('admin')),
);
?>

<h1>View SolicitudesCambioPrecioFacturacion #<?php echo $model->idSolicitudPrecio; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idSolicitudPrecio',
		'idStock',
		'importeLista',
		'importeDescontado',
		'idUsuario',
		'fecha',
		'nroInterno',
	),
)); ?>
