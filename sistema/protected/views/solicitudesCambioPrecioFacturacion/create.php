<?php
$this->breadcrumbs=array(
	'Solicitudes Cambio Precio Facturacions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SolicitudesCambioPrecioFacturacion', 'url'=>array('index')),
	array('label'=>'Manage SolicitudesCambioPrecioFacturacion', 'url'=>array('admin')),
);
?>

<h1>Create SolicitudesCambioPrecioFacturacion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>