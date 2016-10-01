<?php
$this->breadcrumbs=array(
	'Pre Ventas Estados',
);

$this->menu=array(
	array('label'=>'Nuevo Estado', 'url'=>array('create')),
);
?>

<h1>Estados de las PRE-VENTAS</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pre-ventas-nombre-estados-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
		'nombreEstado',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
