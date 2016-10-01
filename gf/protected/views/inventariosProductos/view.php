<?php
$this->breadcrumbs=array(
	'Inventarios Productoses'=>array('index'),
	$model->idInventarioProducto,
);

$this->menu=array(
	array('label'=>'List InventariosProductos', 'url'=>array('index')),
	array('label'=>'Create InventariosProductos', 'url'=>array('create')),
	array('label'=>'Update InventariosProductos', 'url'=>array('update', 'id'=>$model->idInventarioProducto)),
	array('label'=>'Delete InventariosProductos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idInventarioProducto),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage InventariosProductos', 'url'=>array('admin')),
);
?>

<h1>View InventariosProductos #<?php echo $model->idInventarioProducto; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idInventarioProducto',
		'idInventario',
		'fechaProductoInventario',
		'idStockInventario',
		'cantidadInventario',
	),
)); ?>
