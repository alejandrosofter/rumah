<?php
$this->breadcrumbs=array(
	'Cierre Cuentas Efectivos'=>array('index'),
	$model->idCierreCuenta,
);

$this->menu=array(
	array('label'=>'List CierreCuentasEfectivo', 'url'=>array('index')),
	array('label'=>'Create CierreCuentasEfectivo', 'url'=>array('create')),
	array('label'=>'Update CierreCuentasEfectivo', 'url'=>array('update', 'id'=>$model->idCierreCuenta)),
	array('label'=>'Delete CierreCuentasEfectivo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idCierreCuenta),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CierreCuentasEfectivo', 'url'=>array('admin')),
);
?>

<h1>View CierreCuentasEfectivo #<?php echo $model->idCierreCuenta; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idCierreCuenta',
		'fechaCierreCuenta',
		'idCuentaEfectivo',
		'importeDineroSistema',
		'importeDineroExistente',
	),
)); ?>
