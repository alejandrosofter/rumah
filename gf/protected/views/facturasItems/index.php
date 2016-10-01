<?php
$this->breadcrumbs=array(
	'Facturas Items',
);

$this->menu=array(
	array('label'=>'Create FacturasItems', 'url'=>array('create')),
	array('label'=>'Manage FacturasItems', 'url'=>array('admin')),
);
?>

<h1>Facturas Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
