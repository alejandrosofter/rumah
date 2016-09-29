<?php
$this->breadcrumbs=array(
	'Stock'=>array('/stock'),'Tipo de Productos'=>array('/stockTipoProducto'),
	$model->idStockTipo=>array('view','id'=>$model->idStockTipo),
	'Update',
);

$this->menu=array(
		array('label'=>'Listar Tipo de Productos', 'url'=>array('index')),
	array('label'=>'Nuevo Tipo de Producto', 'url'=>array('create')),
	array('label'=>'Ver Tipo de Producto', 'url'=>array('view', 'id'=>$model->idStockTipo)),
	array('label'=>'Quitar Tipo de Producto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idStockTipo),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Actualizar Tipo de Producto <?php echo $model->idStockTipo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>