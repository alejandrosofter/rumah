<?php
$this->breadcrumbs=array(
	'Rutinas Recursoses',
);

$this->menu=array(
	array('label'=>'Volver a Rutinas', 'url'=>array('/rutinasOrdenesTrabajo')),
    array('label'=>'Agregar Recurso', 'url'=>array('/rutinasRecursos/create&id='.$_GET['id'])),
);
?>

<h1>Recursos de la Rutina</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'rutinas-recursos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'recurso',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>