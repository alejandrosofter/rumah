<?php
$this->breadcrumbs=array(
	'Mantenimientos Rutinas',
);

$this->menu=array(
	array('label'=>'Create MantenimientosRutina', 'url'=>array('create')),
	array('label'=>'Manage MantenimientosRutina', 'url'=>array('admin')),
);
?>

<h1>Mantenimientos Rutinas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
