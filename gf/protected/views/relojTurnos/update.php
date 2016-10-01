<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Turnos'=>array('admin'),
	$model->idTurno=>array('view','id'=>$model->idTurno),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Agregar turnos', 'url'=>array('create')),
	array('label'=>'Ver turnos', 'url'=>array('view', 'id'=>$model->idTurno)),
	array('label'=>'Volver a turnos', 'url'=>array('admin')),
);
?>

<h1>Actualizar turnos <?php echo $model->idTurno; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>