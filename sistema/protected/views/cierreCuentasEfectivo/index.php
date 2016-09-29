<?php
$this->breadcrumbs=array(
	'Cierre Cuentas Efectivos',
);

$this->menu=array(
	array('label'=>'Create CierreCuentasEfectivo', 'url'=>array('create')),
	array('label'=>'Manage CierreCuentasEfectivo', 'url'=>array('admin')),
);
?>

<h1>Cierre Cuentas Efectivos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
