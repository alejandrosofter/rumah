<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Empleados'=>array('admin'),
	// $model->idEmpleado=>array('view','id'=>$model->idEmpleado),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Crear empleado', 'url'=>array('create')),
	array('label'=>'Ver empleados', 'url'=>array('view', 'id'=>$model->idEmpleado)),
);
?>

<h1>Actualizar empleados <?php ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>