<?php
$this->breadcrumbs=array(
	'Facturas Entrantes Conceptos',
);

$this->menu=array(
	array('label'=>'Create FacturasEntrantesConcepto', 'url'=>array('create')),
	array('label'=>'Manage FacturasEntrantesConcepto', 'url'=>array('admin')),
);
?>

<h1>Facturas Entrantes Conceptos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
