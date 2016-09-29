<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Tipo turnos'=>array('admin'),
	$model->idTipoTurno=>array('view','id'=>$model->idTipoTurno),
	'Update',
);

$this->menu=array(
	array('label'=>'Agregar tipo turnos', 'url'=>array('create')),
	array('label'=>'Ver tipo turnos', 'url'=>array('view', 'id'=>$model->idTipoTurno)),
	array('label'=>'Volver a tipo turnos', 'url'=>array('admin')),
);
?>

<h1>Update RelojTipoTurnos <?php echo $model->idTipoTurno; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>