<?php
$this->breadcrumbs=array(
	'Cuentas Efectivo',
);

$this->menu=array(
	array('label'=>'Nueva Cuenta', 'url'=>array('create')),
	array('label'=>'Listar Cuentas'),
);
?>

<h1>Cuentas </h1>
Estas cuentas son las que se definen en los PAGOS y GASTOS.
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cuentas-efectivo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idCuentaEfectivo',
		'nombre',
		'moneda',
		'tipo',
		'acuerdo',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
