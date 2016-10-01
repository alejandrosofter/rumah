<?php
$this->breadcrumbs=array(
	'Rutinas Ordenes Trabajos'=>array('index'),
	'Nueva',
);

$this->menu=array(
	array('label'=>'Listar Rutinas', 'url'=>array('index')),
);
?>

<h1>Nueva Rutina</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>