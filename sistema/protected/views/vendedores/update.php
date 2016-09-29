<?php
$this->breadcrumbs=array(
	'Vendedores'=>array('index'),
	$model->idVendedor=>array('view','id'=>$model->idVendedor),
	'Update',
);

$this->menu=array(
	array('label'=>'List Vendedores', 'url'=>array('index')),
	array('label'=>'Create Vendedores', 'url'=>array('create')),
	array('label'=>'View Vendedores', 'url'=>array('view', 'id'=>$model->idVendedor)),
	array('label'=>'Manage Vendedores', 'url'=>array('admin')),
);
?>

<h1>Update Vendedores <?php echo $model->idVendedor; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>