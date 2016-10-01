<?php
$this->breadcrumbs=array(
	'Ordenes Trabajo Coordinaciones',
);

$this->menu=array(
	array('label'=>'Create OrdenesTrabajoCoordinaciones', 'url'=>array('create')),
	array('label'=>'Manage OrdenesTrabajoCoordinaciones', 'url'=>array('admin')),
);
?>

<h1>Ordenes Trabajo Coordinaciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
