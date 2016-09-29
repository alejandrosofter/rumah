<?php
$this->breadcrumbs=array(
	'Centro de Servicios'=>array('/servicios/centroServicios'),
	'Actualizar Servicio',
);


$this->menu=array(
	array('label'=>'Listar Servicios', 'url'=>array('index')),
	array('label'=>'Nuevo Servicio', 'url'=>array('create')),
	array('label'=>'Ver Servicio', 'url'=>array('view', 'id'=>$model->idStock)),
	array('label'=>'Cuentas', 'url'=>array('/cuentas')),
	array('label'=>'Listas de Precios', 'url'=>array('/stockPrecios')),

);
?>

<h1>Ver Servicio #<?php echo $model->idStock; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(

		'nombre',
		'detalle:html',
		'estado',
		'porcentajeIva',
	
	),
)); ?>
