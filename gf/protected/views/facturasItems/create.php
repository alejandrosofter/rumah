<?php
$this->breadcrumbs=array(
	'Facturas Items'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FacturasItems', 'url'=>array('index')),
	array('label'=>'Manage FacturasItems', 'url'=>array('admin')),
);
?>

<h1>Create FacturasItems</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>