<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Sucursales'=>array('admin'),
	$model->idSucursal,
);

$this->menu=array(
	array('label'=>'Agregar sucursales', 'url'=>array('create')),
	array('label'=>'Actualizar sucursales', 'url'=>array('update', 'id'=>$model->idSucursal)),
	array('label'=>'Eliminar sucursales', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idSucursal),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Volver a sucursales', 'url'=>array('admin')),
);
?>

<h1>Ver sucursales #<?php echo $model->idSucursal; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idSucursal',
		'nombreSucursal',
		'direccionSucursal',
		'telefonoSucursal',
	),
)); ?>
