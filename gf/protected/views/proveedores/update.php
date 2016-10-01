<?php
$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	$model->idProveedor=>array('view','id'=>$model->idProveedor),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Proveedores', 'url'=>array('index')),
	array('label'=>'Crear Proveedores', 'url'=>array('create')),
	array('label'=>'Ver Proveedores', 'url'=>array('view', 'id'=>$model->idProveedor)),
	
);
?>

<h1>Modificar Proveedores <?php echo $model->idProveedor; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>