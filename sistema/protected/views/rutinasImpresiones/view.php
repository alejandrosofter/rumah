<?php
$this->breadcrumbs=array(
	'Rutinas Impresiones'=>array('index'),
	$model->idRutinaImpresion,
);

$this->menu=array(
	array('label'=>'List RutinasImpresiones', 'url'=>array('index')),
	array('label'=>'Create RutinasImpresiones', 'url'=>array('create')),
	array('label'=>'Update RutinasImpresiones', 'url'=>array('update', 'id'=>$model->idRutinaImpresion)),
	array('label'=>'Delete RutinasImpresiones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idRutinaImpresion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RutinasImpresiones', 'url'=>array('admin')),
);
?>

<h1>View RutinasImpresiones #<?php echo $model->idRutinaImpresion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idRutinaImpresion',
		'idRutina',
		'detalleImpresion',
		'cantidadDefecto',
	),
)); ?>
