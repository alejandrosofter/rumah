<?php
$this->breadcrumbs=array(
	'Centros Costos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Centros Costo', 'url'=>array('index')),
	array('label'=>'Crear Centro de Costo', 'url'=>array('create')),
);
?>

<h1>Crear Centro de Costo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>