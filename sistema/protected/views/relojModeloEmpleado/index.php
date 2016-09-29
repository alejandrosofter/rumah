<?php
$this->breadcrumbs=array(
	'Reloj Modelo Empleados',
);

$this->menu=array(
	array('label'=>'Create RelojModeloEmpleado', 'url'=>array('create')),
	array('label'=>'Manage RelojModeloEmpleado', 'url'=>array('admin')),
);
?>

<h1>Reloj Modelo Empleados</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
