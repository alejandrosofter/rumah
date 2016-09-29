<?php
$this->breadcrumbs=array(
	'Clasificacion AFIP'=>array('index'),
	$model->idClasificacionAfip,
);

$this->menu=array(
	array('label'=>'Listar Clasificacion AFIP', 'url'=>array('index')),
	array('label'=>'Crear Clasificacion AFIP', 'url'=>array('create')),
	array('label'=>'Modificar Clasificacion AFIP', 'url'=>array('update', 'id'=>$model->idClasificacionAfip)),
	array('label'=>'Eliminar Clasificacion AFIP', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idClasificacionAfip),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>Ver Clasificacion AFIP #<?php echo $model->idClasificacionAfip; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idClasificacionAfip',
		'nombreClasificacionAfip',
		'codigoClasificacion',
		'detalle',
	),
)); ?>
