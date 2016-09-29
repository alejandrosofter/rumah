<?php
$this->breadcrumbs=array(
	'Movimientoses'=>array('index'),
	$model->idMovimiento=>array('view','id'=>$model->idMovimiento),
	'Update',
);

$this->menu=array(
	array('label'=>'List Movimientos', 'url'=>array('index')),
	array('label'=>'Create Movimientos', 'url'=>array('create')),
	array('label'=>'View Movimientos', 'url'=>array('view', 'id'=>$model->idMovimiento)),
	array('label'=>'Manage Movimientos', 'url'=>array('admin')),
);
?>

<h1>Update Movimientos <?php echo $model->idMovimiento; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>