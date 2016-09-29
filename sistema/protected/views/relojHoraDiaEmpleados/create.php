<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Hora dia empleados'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Manejador horas dia empleado', 'url'=>array('admin')),
);
?>

<h1>Agregar horas dia empleado</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>