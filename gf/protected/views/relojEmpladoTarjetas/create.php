<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Tarjetas empleados'=>array('admin'.'&idEmpleado='.$idEmpleado),
	'Crear',
);

$this->menu=array(
	array('label'=>'Volver a tarjetas de empleados', 'url'=>array('admin'.'&idEmpleado='.$idEmpleado)),
	array('label'=>'Volver a empleados', 'url'=>array('RelojEmpleados/admin')),
);
?>

<h1>Crear tarjetas de empleados</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>