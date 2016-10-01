<?php
$this->breadcrumbs=array(
	'Movimientoses',
);

$this->menu=array(
	array('label'=>'Create Movimientos', 'url'=>array('create')),
	array('label'=>'Manage Movimientos', 'url'=>array('admin')),
);
?>

<h1>Movimientoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
