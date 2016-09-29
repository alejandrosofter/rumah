<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Tarjetas empleados'=>array('admin'),
	$model->idEmpleadoTarjeta=>array('view','id'=>$model->idEmpleadoTarjeta),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Crear tarjetas empleados', 'url'=>array('create')),
	array('label'=>'Ver tarjetas empleados', 'url'=>array('view', 'id'=>$model->idEmpleadoTarjeta)),
	array('label'=>'Administrar tarjetas empleados', 'url'=>array('admin')),
);
?>

<h1>Actualizar tarjetas empleados <?php echo $model->idEmpleadoTarjeta; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>