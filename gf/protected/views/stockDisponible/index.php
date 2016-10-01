<?php
$this->breadcrumbs=array(
	'Stock Disponibles',
);

$this->menu=array(
	array('label'=>'Create StockDisponible', 'url'=>array('create')),
	array('label'=>'Manage StockDisponible', 'url'=>array('admin')),
);
?>

<h1>Stock Disponibles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
