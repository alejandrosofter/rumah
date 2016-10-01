<?php
$this->breadcrumbs=array(
	'Rutinas Recursoses'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Volver', 'url'=>array('/rutinasRecursos/index&id='.$_GET['id'])),
);
?>

<h1>Create RutinasRecursos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>