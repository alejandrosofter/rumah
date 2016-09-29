<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Categorias del reloj'=>array('admin'),
	$model->idCateogria=>array('view','id'=>$model->idCateogria),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Crear categorias', 'url'=>array('create')),
	array('label'=>'Ver categorias', 'url'=>array('view', 'id'=>$model->idCateogria)),
	array('label'=>'Administrar categorias', 'url'=>array('admin')),
);
?>

<h1>Actualizar categorias <?php echo $model->idCateogria; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>