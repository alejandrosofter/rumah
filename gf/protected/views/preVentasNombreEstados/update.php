<?php
$this->breadcrumbs=array(
	'Pre Ventas Nombre Estados'=>array('index'),
	$model->idPreventaEmpresaNombreEstado=>array('view','id'=>$model->idPreventaEmpresaNombreEstado),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Estado de PRE-VENTAS', 'url'=>array('index')),
	array('label'=>'Nuevo Estado', 'url'=>array('create')),
);
?>

<h1>Actualizar Pre Venta ESTADO <?php echo $model->idPreventaEmpresaNombreEstado; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>