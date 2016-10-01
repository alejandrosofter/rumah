<?php
$this->breadcrumbs=array(
	'Tareas Estadoses',
);

$this->menu=array(
	array('label'=>'Create TareasEstados', 'url'=>array('create')),
	array('label'=>'Manage TareasEstados', 'url'=>array('admin')),
);
?>

<h1>Tareas Estadoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
