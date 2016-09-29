<?php
$this->breadcrumbs=array(
	'Proveedores'=>array('/proveedores'),'Rubros'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Rubros', 'url'=>array('index')),
	array('label'=>'Crear Rubro', 'url'=>array('create')),
);
?>

<h1>Crear Rubro</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>