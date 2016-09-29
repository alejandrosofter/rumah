<?php
$this->breadcrumbs=array(
	'Pre Ventas Empresas'=>array('index'),
	$model->idPreventaEmpresa=>array('view','id'=>$model->idPreventaEmpresa),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Empresas', 'url'=>array('index')),
	array('label'=>'Nueva Empresa', 'url'=>array('create')),
);
?>

<h1>Actualizar Empresa<?php echo $model->idPreventaEmpresa; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>