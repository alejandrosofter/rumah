<?php
$this->breadcrumbs=array(
	'Pedidoses'=>array('index'),
	$model->idPedido=>array('view','id'=>$model->idPedido),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pedidos', 'url'=>array('index')),
	array('label'=>'Create Pedidos', 'url'=>array('create')),
	array('label'=>'View Pedidos', 'url'=>array('view', 'id'=>$model->idPedido)),
	array('label'=>'Manage Pedidos', 'url'=>array('admin')),
);
?>

<h1>Update Pedidos <?php echo $model->idPedido; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>