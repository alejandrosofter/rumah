<?php
$this->breadcrumbs=array(
	'Proveedores'=>array('/proveedores'),'Rubros'=>array('index'),
	$model->idProveedor_rubro=>array('view','id'=>$model->idProveedor_rubro),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProveedoresRubros', 'url'=>array('index')),
	array('label'=>'Create ProveedoresRubros', 'url'=>array('create')),
	array('label'=>'View ProveedoresRubros', 'url'=>array('view', 'id'=>$model->idProveedor_rubro)),
	array('label'=>'Manage ProveedoresRubros', 'url'=>array('admin')),
);
?>

<h1>Update ProveedoresRubros <?php echo $model->idProveedor_rubro; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>