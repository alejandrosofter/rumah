<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Motivos'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Agregar Motivos', 'url'=>array('create')),
	array('label'=>'Ver Motivos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Volver a Motivos', 'url'=>array('admin')),
);
?>

<h1>Actualizar motivos <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>