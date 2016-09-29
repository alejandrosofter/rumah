<?php
$this->breadcrumbs=array(
	'Mensajes'=>array('index'),
	$model->idMensaje,
);

?>

<h1>Ver Mensaje #<?php echo $model->idMensaje; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idMensaje',
		'cuerpoMensaje',
		'tituloMensaje',
		'tipoMensaje',
		'fechaMensaje',
		'destinatario',
		'remitente',
	),
)); ?>
