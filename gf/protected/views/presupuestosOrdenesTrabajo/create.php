<?php
$this->breadcrumbs=array(
	'Presupuestos Ordenes Trabajos'=>array('index'),
	'Nueva',
);

$this->menu=array(
	array('label'=>'Listar Presupuestos', 'url'=>array('/presupuestos')),
	array('label'=>'Listar Ordenes', 'url'=>array('/ordenesTrabajo')),
);
?>

<h1>Asignar Orden a Presupuesto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>