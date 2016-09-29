<?php
$this->breadcrumbs=array(
	'Rutinas Impresiones'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Volver', 'url'=>array('index')),
);
?>

<h1>Nueva Impresion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>