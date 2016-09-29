<?php
$this->breadcrumbs=array(
	'Proveedores'=>array('/proveedores'),'Rubros'=>array('index'),
	$model->idProveedor_rubro,
);

$this->menu=array(
	array('label'=>'List ProveedoresRubros', 'url'=>array('index')),
	array('label'=>'Create ProveedoresRubros', 'url'=>array('create')),
	array('label'=>'Update ProveedoresRubros', 'url'=>array('update', 'id'=>$model->idProveedor_rubro)),
	array('label'=>'Delete ProveedoresRubros', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idProveedor_rubro),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProveedoresRubros', 'url'=>array('admin')),
);
?>

<h1>View ProveedoresRubros #<?php echo $model->idProveedor_rubro; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idProveedor_rubro',
		'nombre',
		'idCuenta',
	),
)); ?>
