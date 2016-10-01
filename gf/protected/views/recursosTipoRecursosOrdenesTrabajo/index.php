<?php
$this->breadcrumbs=array(
	'Recursos Tipo Recursos Ordenes Trabajos',
);

$this->menu=array(
	array('label'=>'Nuevo Tipo de Recurso', 'url'=>array('create')),
    array('label'=>'Ir a Recursos', 'url'=>array('/recursosOrdenesTrabajo')),
);
?>

<h1>Tipo de Recursos</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'recursos-tipo-recursos-ordenes-trabajo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nombreTipoRecurso',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>