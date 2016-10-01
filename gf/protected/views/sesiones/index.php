<?php
$this->breadcrumbs=array(
	'Sesiones',
);

$this->menu=array(
	array('label'=>'Create Sesiones', 'url'=>array('create')),
	array('label'=>'Manage Sesiones', 'url'=>array('admin')),
);
?>

<h1>Sesiones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
