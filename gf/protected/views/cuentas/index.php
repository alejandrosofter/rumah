<?php
$this->breadcrumbs=array(
	'Cuentas',
);

$this->menu=array(
	array('label'=>'Crear Cuentas', 'url'=>array('create')),
	array('label'=>'Centros de Costos', 'url'=>array('/centrosCosto')),
);
?>

<h1>Cuentas</h1>
Las siguientes son cuentas para la administracion general, esto diferencia a los proveedores en diferentes TIPOS. <br>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cuentas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idCuenta',
		'nombre',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
