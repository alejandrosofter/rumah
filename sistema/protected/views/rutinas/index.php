<?php
$this->breadcrumbs=array(
	'Rutinas',
);

$this->menu=array(
	array('label'=>'Crear Rutinas', 'url'=>array('create')),
	array('label'=>'Manage Rutinas', 'url'=>array('admin')),
);
?>

<h1>Rutinases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
