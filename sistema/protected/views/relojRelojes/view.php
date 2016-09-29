<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Reloj'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Agregar relojes', 'url'=>array('create')),
	array('label'=>'Actualizar relojes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar relojes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Volver a relojes', 'url'=>array('admin')),
);
?>

<h1>Ver relojes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'modelo',
	),
)); ?>
