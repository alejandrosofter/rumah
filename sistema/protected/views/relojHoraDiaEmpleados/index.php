<?php
$this->breadcrumbs=array(
	'Reloj Hora Dia Empleadoses',
);

$this->menu=array(
	array('label'=>'Create RelojHoraDiaEmpleados', 'url'=>array('create')),
	array('label'=>'Manage RelojHoraDiaEmpleados', 'url'=>array('admin')),
);
?>

<h1>Reloj Hora Dia Empleadoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
