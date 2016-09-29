<?php
$this->breadcrumbs=array(
	'Vendedores',
);

$this->menu=array(
	array('label'=>'Create Vendedores', 'url'=>array('create')),
	array('label'=>'Manage Vendedores', 'url'=>array('admin')),
);
?>

<h1>Vendedores</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'vendedores-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nombre',
		'apellido',
		'telefono',
		'nroLegajo',
		'porcentajeGanancia',
		/*
		'fechaInicio',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
