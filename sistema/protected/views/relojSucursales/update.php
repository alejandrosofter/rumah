<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Sucursales'=>array('admin'),
	$model->idSucursal=>array('view','id'=>$model->idSucursal),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Agregar sucursales', 'url'=>array('create')),
	array('label'=>'Ver sucursales', 'url'=>array('view', 'id'=>$model->idSucursal)),
	array('label'=>'Volver a sucursales', 'url'=>array('admin')),
);
?>

<h1>Actualizar sucursales <?php echo $model->idSucursal; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>