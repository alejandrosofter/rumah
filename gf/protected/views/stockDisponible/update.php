<?php
$this->breadcrumbs=array(
	'Stock Disponibles'=>array('index'),
	$model->idStockDisponible=>array('view','id'=>$model->idStockDisponible),
	'Update',
);

$this->menu=array(
	array('label'=>'List StockDisponible', 'url'=>array('index')),
	array('label'=>'Create StockDisponible', 'url'=>array('create')),
	array('label'=>'View StockDisponible', 'url'=>array('view', 'id'=>$model->idStockDisponible)),
	array('label'=>'Manage StockDisponible', 'url'=>array('admin')),
);
?>

<h1>Update StockDisponible <?php echo $model->idStockDisponible; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>