<?php
$this->breadcrumbs=array(
	'Rutinas Estados Ordenes Trabajos'=>array('index'),
	$model->idOrdenTrabajoRutinaEstado=>array('view','id'=>$model->idOrdenTrabajoRutinaEstado),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Volver', 'url'=>array('index&id='.$_GET['id'])),
);
?>

<h1>ACtualizar <?php echo $model->idOrdenTrabajoRutinaEstado; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>