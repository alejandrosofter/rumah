<?php
$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listado Proveedores', 'url'=>array('index')),
	array('label'=>'Crear Proveedor', 'url'=>array('create')),

);

?>

<h1>Crear Proveedor</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>