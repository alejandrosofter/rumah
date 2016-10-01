<?php
$this->breadcrumbs=array(
	'Facturas Items'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FacturasItems', 'url'=>array('index')),
	array('label'=>'Create FacturasItems', 'url'=>array('create')),
	array('label'=>'View FacturasItems', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FacturasItems', 'url'=>array('admin')),
);
?>

<h1>Update FacturasItems <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>