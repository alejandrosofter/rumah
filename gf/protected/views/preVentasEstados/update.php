<?php
$this->breadcrumbs=array(
	'Pre Ventas Estadoses'=>array('index'),
	$model->idPreventaEmpresaEstado=>array('view','id'=>$model->idPreventaEmpresaEstado),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Estados', 'url'=>array('index&id='.$_GET['id'])),
);
?>

<h1>Actualizar Estado<?php echo $model->idPreventaEmpresaEstado; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>