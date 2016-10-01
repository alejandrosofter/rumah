<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Relojes'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Agregar relojes', 'url'=>array('create')),
	array('label'=>'Ver relojes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Volver a relojes', 'url'=>array('admin')),
);
?>

<h1>Actualizar relojes <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>