<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Categorias de reloj'=>array('admin'),
	$model->idCateogria,
);

$this->menu=array(
	array('label'=>'Crear categorias', 'url'=>array('create')),
	array('label'=>'Actualizar categorias', 'url'=>array('update', 'id'=>$model->idCateogria)),
	array('label'=>'Eliminar categorias', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idCateogria),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar categorias', 'url'=>array('admin')),
);
?>

<h1>Ver categorias #<?php echo $model->idCateogria; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idCateogria',
		'nombreCategoria',
		'content',
	),
)); ?>
