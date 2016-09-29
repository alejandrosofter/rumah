<?php
$this->breadcrumbs=array(
	'Cuentas Efectivo'=>array('index'),
	$model->idCuentaEfectivo,
);

$this->menu=array(
	array('label'=>'Listar Cuentas', 'url'=>array('index')),
	array('label'=>'Nueva Cuenta', 'url'=>array('create')),
	array('label'=>'Actualizar Cuenta', 'url'=>array('update', 'id'=>$model->idCuentaEfectivo)),
	array('label'=>'Quitar Cuenta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idCuentaEfectivo),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Ver Cuentas #<?php echo $model->idCuentaEfectivo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nombre',
		'moneda',
		'tipo',
		'acuerdo',
	),
)); ?>
