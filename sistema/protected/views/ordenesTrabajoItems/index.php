<?php
$this->breadcrumbs=array(
	'Ordenes Trabajo Items',
);

$this->menu=array(
	array('label'=>'Create OrdenesTrabajoItems', 'url'=>array('create')),
	array('label'=>'Manage OrdenesTrabajoItems', 'url'=>array('admin')),
);
?>

<h1>Ordenes Trabajo Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
