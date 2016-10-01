<?php
$this->breadcrumbs=array(
	'Mantenimientos Empresas'=>array('index'),
	$model->idMantenimientoEmpresa=>array('view','id'=>$model->idMantenimientoEmpresa),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Mantenimiento', 'url'=>array('index')),
	array('label'=>'Crear Mantenimiento', 'url'=>array('create')),
	array('label'=>'Ver Mantenimiento', 'url'=>array('view', 'id'=>$model->idMantenimientoEmpresa)),
);
?>

<h1>Actualizar Mantenimiento <?php echo $model->idMantenimientoEmpresa; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>