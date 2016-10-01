<?php
$this->breadcrumbs=array(
	'Clasificacion AFIP'=>array('index'),
	$model->idClasificacionAfip=>array('view','id'=>$model->idClasificacionAfip),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Clasificacion AFIP', 'url'=>array('index')),
	array('label'=>'Crear Clasificacion AFIP', 'url'=>array('create')),
	array('label'=>'Ver Clasificacion AFIP', 'url'=>array('view', 'id'=>$model->idClasificacionAfip)),
	
);
?>

<h1>Modificar Clasificacion AFIP <?php echo $model->idClasificacionAfip; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>