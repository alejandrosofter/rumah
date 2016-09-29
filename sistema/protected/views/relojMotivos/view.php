<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Motivos'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Agregar motivos', 'url'=>array('create')),
	array('label'=>'Actualizar motivos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar motivos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Volver a motivos', 'url'=>array('admin')),
);
?>

<h1>Ver motivos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
	),
)); ?>
