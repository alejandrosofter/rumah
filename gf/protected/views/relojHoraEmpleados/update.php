<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Horas empleados'=>array('admin'),
	$model->idHora=>array('view','id'=>$model->idHora),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Crear horas empleados', 'url'=>array('create')),
	array('label'=>'Ver horas empleados', 'url'=>array('view', 'id'=>$model->idHora)),
	array('label'=>'Admintrar horas empleados', 'url'=>array('admin')),
);
?>

<h1>Actualizar horas empleados <?php echo $model->idHora; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>