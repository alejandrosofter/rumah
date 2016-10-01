<?php
$this->breadcrumbs=array(
	'Recursos Ordenes Trabajos',
);

$this->menu=array(
	array('label'=>'Nuevo Recurso', 'url'=>array('create')),
    array('label'=>'Ir a Rutinas', 'url'=>array('/rutinasOrdenesTrabajo')),
);
?>

<h1>Recursos Ordenes Trabajos</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'recursos-ordenes-trabajo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'tipoRecurso',
		'nombre',
		'descripcion',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>