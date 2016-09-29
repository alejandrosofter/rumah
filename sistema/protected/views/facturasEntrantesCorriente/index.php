<?php
$this->breadcrumbs=array(
	'Facturas Entrantes Corrientes',
);

$this->menu=array(
	array('label'=>'Create FacturasEntrantesCorriente', 'url'=>array('create')),
	array('label'=>'Manage FacturasEntrantesCorriente', 'url'=>array('admin')),
);
?>

<h1>Facturas Entrantes Corrientes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
