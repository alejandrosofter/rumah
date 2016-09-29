<?php
$this->breadcrumbs=array(
	'Rutinas Recursoses'=>array('index'),
	$model->idRutinaIdRecurso=>array('view','id'=>$model->idRutinaIdRecurso),
	'Update',
);

$this->menu=array(
	array('label'=>'Volver', 'url'=>array('rutinasRecursos/index&id='.$_GET['id'])),
);
?>

<h1>Update RutinasRecursos <?php echo $model->idRutinaIdRecurso; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>