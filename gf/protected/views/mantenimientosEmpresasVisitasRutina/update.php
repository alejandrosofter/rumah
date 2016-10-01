<?php
$this->breadcrumbs=array(
	'Mantenimientos Empresas Visitas Rutinas'=>array('index'),
	$model->idMantenimientoEmpresaVisitaRutina=>array('view','id'=>$model->idMantenimientoEmpresaVisitaRutina),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Rutina Visita', 'url'=>array('verIndividual&idMantenimientoEmpresa='.$model->idMantenimientoEmpresa)),
	array('label'=>'Crear Rutina Visita', 'url'=>array('create&idMantenimientoEmpresa='.$model->idMantenimientoEmpresa)),
	array('label'=>'Ver Rutina Visita', 'url'=>array('view', 'id'=>$model->idMantenimientoEmpresaVisitaRutina)),
	array('label'=>'Manage Rutina Visita', 'url'=>array('admin')),
);
?>

<h1>Actualizar Rutina de Visitas <?php echo $model->idMantenimientoEmpresaVisitaRutina; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>