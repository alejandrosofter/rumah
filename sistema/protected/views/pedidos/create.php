<?php
$this->breadcrumbs=array(
	'Pedidoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pedidos', 'url'=>array('index')),
	array('label'=>'Manage Pedidos', 'url'=>array('admin')),
);
?>

<h1>Create Pedidos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>