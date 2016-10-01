<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Empleados'=>array('admin'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Ver empleados', 'url'=>array('admin')),
);
?>

<h1>Nuevo empleado</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>