<?php
$this->breadcrumbs=array(
	'Stock'=>array('/stock'),'Tipo de Productos'=>array('/stockTipoProducto'),
	$model->idStockTipo,
);

$this->menu=array(
	array('label'=>'Listar Tipo de Productos', 'url'=>array('index')),
	array('label'=>'Nuevo Tipo de Producto', 'url'=>array('create')),
	array('label'=>'Actualizar Tipo de Producto', 'url'=>array('update', 'id'=>$model->idStockTipo)),
	array('label'=>'Quitar Tipo de Producto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idStockTipo),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Ver Tipo de Producto #<?php echo $model->idStockTipo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idStockTipo',
		'nombre',
	),
)); ?>
