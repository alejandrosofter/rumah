<?php
$this->breadcrumbs=array(
	'Pagos'=>array('/gastos'),'Asignaciones',
);
$this->menu=array(
	array('label'=>'Listar Pagos', 'url'=>array('gastos/index')),
	array('label'=>'Nuevo Pago', 'url'=>array('gastos/create')),
	array('label'=>'Listar Asignaciones de Factura'),
	array('label'=>'Ver Cuentas', 'url'=>array('/cuentasEfectivo')),
);
?>

<h1>Asignaciones</h1>
Se listan las asignaciones que se realizaron sobre las facturas:

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gastos-factura-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idGasto',
		'idFacturaSaliente',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
