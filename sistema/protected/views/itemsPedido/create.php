<?php
$this->breadcrumbs=array(
	'Items Pedidos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ItemsPedido', 'url'=>array('index')),
	array('label'=>'Manage ItemsPedido', 'url'=>array('admin')),
);
?>

<h1>Create ItemsPedido</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>