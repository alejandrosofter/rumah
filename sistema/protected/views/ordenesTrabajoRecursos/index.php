<?php
$this->breadcrumbs=array(
	'Recursos de Rutina',
);

$this->menu=array(
	array('label'=>'Volver a Rutinas', 'url'=>array('/rutinasOrdenesTrabajo')),
);
?>

<h1>Recursos de Rutina</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ordenes-trabajo-recursos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idOrdenIdRecurso',
		'idOrdenTrabajo',
		'idRecurso',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
