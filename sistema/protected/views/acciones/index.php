<?php
$this->breadcrumbs=array(
	'Acciones',
);

$this->menu=array(
	array('label'=>'Nueva Accion', 'url'=>array('create')),
);
?>

<h1>Acciones</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'acciones-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idAccion',
		'padre',
		'nombre',
		'direccion',
		'tipo',
		'descripcion',
		'imagen',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
