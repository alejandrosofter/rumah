<?php
$this->breadcrumbs=array(
	'Solicitudes Cambio Precio Facturacions'=>array('index'),
	$model->idSolicitudPrecio=>array('view','id'=>$model->idSolicitudPrecio),
	'Update',
);

$this->menu=array(
	array('label'=>'List SolicitudesCambioPrecioFacturacion', 'url'=>array('index')),
	array('label'=>'Create SolicitudesCambioPrecioFacturacion', 'url'=>array('create')),
	array('label'=>'View SolicitudesCambioPrecioFacturacion', 'url'=>array('view', 'id'=>$model->idSolicitudPrecio)),
	array('label'=>'Manage SolicitudesCambioPrecioFacturacion', 'url'=>array('admin')),
);
?>

<h1>Update SolicitudesCambioPrecioFacturacion <?php echo $model->idSolicitudPrecio; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>