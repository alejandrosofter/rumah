<?php
$this->breadcrumbs=array(
	'Reloj Hora Empleadoses',
);

$this->menu=array(
	array('label'=>'Create RelojHoraEmpleados', 'url'=>array('create')),
	array('label'=>'Manage RelojHoraEmpleados', 'url'=>array('admin')),
);
?>

<h1>Reloj Hora Empleadoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
