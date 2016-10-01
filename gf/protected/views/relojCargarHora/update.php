<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Cargar horas'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Agregar carga de horas', 'url'=>array('create')),
	array('label'=>'Ver carga de horas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Volver a carga de horas', 'url'=>array('admin')),
);
?>

<h1>Actualizar carga de horas <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>