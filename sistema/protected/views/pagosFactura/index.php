<?php
$this->breadcrumbs=array(
	'Pagos Facturas',
);

$this->menu=array(
	array('label'=>'Create PagosFactura', 'url'=>array('create')),
	array('label'=>'Manage PagosFactura', 'url'=>array('admin')),
);
?>

<h1>Pagos Facturas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
