<?php
$this->breadcrumbs=array(
	'Ordenes Trabajo Stocks'=>array('index'),
	$model->idStockOrden=>array('view','id'=>$model->idStockOrden),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrdenesTrabajoStock', 'url'=>array('index')),
	array('label'=>'Create OrdenesTrabajoStock', 'url'=>array('create')),
	array('label'=>'View OrdenesTrabajoStock', 'url'=>array('view', 'id'=>$model->idStockOrden)),
	array('label'=>'Manage OrdenesTrabajoStock', 'url'=>array('admin')),
);
?>

<h1>Update OrdenesTrabajoStock <?php echo $model->idStockOrden; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>