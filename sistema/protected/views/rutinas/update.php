<?php
$this->breadcrumbs=array(
	'Rutinas'=>array('index'),
	$model->idRutina=>array('view','id'=>$model->idRutina),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Rutinas', 'url'=>array('verIndividual&idMantenimientoEmpresa='.$idMantenimientoEmpresa)),
//	'url'=>array('create&idMantenimientoEmpresa='.$idMantenimientoEmpresa)),
	array('label'=>'Crear Rutinas', 'url'=>array('create&idMantenimientoEmpresa='.$idMantenimientoEmpresa)),
	array('label'=>'Ver Rutinas', 'url'=>array('view&id='.$model->idRutina.'&idMantenimientoEmpresa='.$idMantenimientoEmpresa)),
	
	array('label'=>'Manage Rutinas', 'url'=>array('admin')),
	
);
echo $idMantenimientoEmpresa;
?>

<h1>Actualizar Rutinas <?php echo $model->idRutina; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>