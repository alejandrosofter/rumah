<?php
$this->breadcrumbs=array(
	'Tareas Coordinaciones',
);

$this->menu=array(
	array('label'=>'Create TareasCoordinaciones', 'url'=>array('create')),
	array('label'=>'Manage TareasCoordinaciones', 'url'=>array('admin')),
);
?>

<h1>Tareas Coordinaciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
