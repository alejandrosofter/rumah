<?php
$this->breadcrumbs=array(
	'Stock Marcases'=>array('index'),
	$model->idStockMarcas,
);

$this->menu=array(
	array('label'=>'Listar Marcas', 'url'=>array('index')),
	array('label'=>'Crear Marca', 'url'=>array('create')),
	array('label'=>'Actualizar Marca', 'url'=>array('update', 'id'=>$model->idStockMarcas)),
	array('label'=>'Eliminar Marca', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idStockMarcas),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StockMarcas', 'url'=>array('admin')),
);
?>

<h1>VER MARCA #<?php echo $model->idStockMarcas; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idStockMarcas',
		'nombreMarca',
		'adicionalNumeroMarca',
		'adicionalCadenaMarca',
	),
)); ?>
