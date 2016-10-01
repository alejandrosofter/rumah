<?php
$this->breadcrumbs=array(
	'Items Pedidos'=>array('index'),
	$model->idItemPedido=>array('view','id'=>$model->idItemPedido),
	'Update',
);

$this->menu=array(
	array('label'=>'List ItemsPedido', 'url'=>array('index')),
	array('label'=>'Create ItemsPedido', 'url'=>array('create')),
	array('label'=>'View ItemsPedido', 'url'=>array('view', 'id'=>$model->idItemPedido)),
	array('label'=>'Manage ItemsPedido', 'url'=>array('admin')),
);
?>

<h1>Update ItemsPedido <?php echo $model->idItemPedido; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>