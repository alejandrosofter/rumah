<?php
$this->breadcrumbs=array(
	'Cuentas Ventas'=>array('index'),
	$model->idCuentaVenta,
);

$this->menu=array(
	array('label'=>'Listar Cuentas', 'url'=>array('index')),
	array('label'=>'Nueva Cuenta', 'url'=>array('create')),
	array('label'=>'Ver Cuenta', 'url'=>array('view', 'id'=>$model->idCuentaVenta)),
);
?>

<h1>Ver Cuenta #<?php echo $model->idCuentaVenta; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idCuentaVenta',
		'nombre',
		'otro',
	),
)); ?>
