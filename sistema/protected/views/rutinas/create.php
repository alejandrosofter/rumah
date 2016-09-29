<?php
$this->breadcrumbs=array(
	'Rutinas'=>array('verIndidivual&idMantenimientoEmpresa='.$idMantenimientoEmpresa),
	'Crear',
);

$this->menu=array(
//"rutinas/verIndividual",array("idMantenimientoEmpresa"=>$data->idMantenimientoEmpresa,"cliente"=>$data->cliente
	array('label'=>'Listar Rutinas', 'url'=>array('verIndividual&idMantenimientoEmpresa='.$idMantenimientoEmpresa)),
	array('label'=>'Manage Rutinas', 'url'=>array('admin')),
);
?>

<h1>Crear Rutinas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>