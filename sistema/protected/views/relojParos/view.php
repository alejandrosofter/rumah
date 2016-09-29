<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Paros'=>array('admin'),
	$model->idParo,
);

$this->menu=array(
	array('label'=>'Agregar paros', 'url'=>array('create')),
	array('label'=>'Actualizar paros', 'url'=>array('update', 'id'=>$model->idParo)),
	array('label'=>'Eliminar paros', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idParo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar paros', 'url'=>array('admin')),
);
?>

<h1>Ver paros #<?php echo $model->idParo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idParo',
		'fechaParo',
		'comentarioParo',
	),
)); ?>
