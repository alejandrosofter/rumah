<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Incidencias'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'CrearIncidencias', 'url'=>array('create')),
	array('label'=>'Ver Incidencias', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Volver a Incidencias', 'url'=>array('admin')),
);
?>

<h1>Actualizar incidencias <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>