<?php
$this->breadcrumbs=array(
	'Juridicciones'=>array('index'),
	$model->idJuridiccion=>array('view','id'=>$model->idJuridiccion),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Juridicciones', 'url'=>array('index')),
	array('label'=>'Crear Juridicciones', 'url'=>array('create')),
	array('label'=>'Ver Juridicciones', 'url'=>array('view', 'id'=>$model->idJuridiccion)),
	
);
?>

<h1>Modificar Juridicciones <?php echo $model->idJuridiccion; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>