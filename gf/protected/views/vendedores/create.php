<?php
$this->breadcrumbs=array(
	'Vendedores'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Vendedores', 'url'=>array('index')),
	array('label'=>'Manage Vendedores', 'url'=>array('admin')),
);
?>

<h1>Create Vendedores</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>