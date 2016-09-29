<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Hora dia empleados'=>array('admin'),
	$model->idHoraDiaEmpleado=>array('view','id'=>$model->idHoraDiaEmpleado),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Crear hora dia empleado', 'url'=>array('create')),
	array('label'=>'Ver hora dia empleado', 'url'=>array('view', 'id'=>$model->idHoraDiaEmpleado)),
	array('label'=>'Manejar hora dia empleado', 'url'=>array('admin')),
);
?>

<h1>Actualizar hora dia empleado <?php echo $model->idHoraDiaEmpleado; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>