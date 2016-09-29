<?php
$this->breadcrumbs=array(
	'Ordenes Trabajo Cambio Estados',
);

$this->menu=array(
	array('label'=>'Create OrdenesTrabajoCambioEstado', 'url'=>array('create')),
	array('label'=>'Manage OrdenesTrabajoCambioEstado', 'url'=>array('admin')),
);
?>

<h1>Ordenes Trabajo Cambio Estados</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
