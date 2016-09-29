<?php
$this->breadcrumbs=array(
	'Pre Ventas Empresases'=>array('index'),
	$model->idPreventaEmpresa,
);

$this->menu=array(
	array('label'=>'List PreVentasEmpresas', 'url'=>array('index')),
	array('label'=>'Create PreVentasEmpresas', 'url'=>array('create')),
	array('label'=>'Update PreVentasEmpresas', 'url'=>array('update', 'id'=>$model->idPreventaEmpresa)),
	array('label'=>'Delete PreVentasEmpresas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idPreventaEmpresa),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PreVentasEmpresas', 'url'=>array('admin')),
);
?>

<h1>View PreVentasEmpresas #<?php echo $model->idPreventaEmpresa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idPreventaEmpresa',
		'fecha',
		'empresa',
		'telefono',
		'email',
		'estado',
		'idUsuario',
		'interes',
	),
)); ?>
