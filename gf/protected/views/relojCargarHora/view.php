<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Carga horas'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Crear carga de horas', 'url'=>array('create')),
	array('label'=>'Actualizar carga de horas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar carga de horas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Volver a carga de horas', 'url'=>array('admin')),
);
?>

<h1>Ver carga de horas #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fecha',
		'archivo',
		'idUsuario',
		'idSucursal',
		'nombreArchivo',
	),
)); ?>
