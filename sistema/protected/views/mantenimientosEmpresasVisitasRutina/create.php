<?php
$this->breadcrumbs=array(
	'Mantenimientos Empresas Visitas Rutinas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Rutina Visita', 'url'=>array('verIndividual&idMantenimientoEmpresa='.$model->idMantenimientoEmpresa)),
	array('label'=>'Manage Rutina Visita', 'url'=>array('admin')),
);
?>

<h1>Crear Rutina de Visitas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>