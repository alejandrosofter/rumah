<?php
$this->breadcrumbs=array(
	'Cuenta de Ventas',
);

$this->menu=array(
	array('label'=>'Nueva Cuenta de Venta', 'url'=>array('create')),
);
?>

<h1>Cuentas de Ventas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
