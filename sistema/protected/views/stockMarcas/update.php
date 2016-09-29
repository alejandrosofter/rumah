<?php
$this->breadcrumbs=array(
	'Marcas'=>array('index'),
	$model->idStockMarcas=>array('view','id'=>$model->idStockMarcas),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Marcas', 'url'=>array('index')),
	array('label'=>'Crear Marca', 'url'=>array('create')),
	array('label'=>'Ver Marca', 'url'=>array('view', 'id'=>$model->idStockMarcas)),
	array('label'=>'Manage StockMarcas', 'url'=>array('admin')),
);
?>

<h1>ACTUALIZAR MARCA <?php echo $model->idStockMarcas; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>