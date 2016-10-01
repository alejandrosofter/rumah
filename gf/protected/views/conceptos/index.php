<?php
$this->breadcrumbs=array(
	'Conceptos',
);

$this->menu=array(
	array('label'=>'Nuevo Concepto', 'url'=>array('create')),
);
?>

<h1>Conceptos</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'conceptos-grid',
    'ajaxUpdate'=>false,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nombreConcepto',
		'nombreCuenta',
		'codigoConcepto',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
