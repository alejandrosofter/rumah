<?php
$this->breadcrumbs=array(
	'Presupuestos'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Presupuestos', 'url'=>array('index')),
);
?>

<h1>Nuevo Presupuesto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>