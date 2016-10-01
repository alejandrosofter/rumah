<?php
$this->breadcrumbs=array(
	'Pre Ventas Estadoses'=>array('index'),
	$model->idPreventaEmpresaEstado,
);

$this->menu=array(
	array('label'=>'List PreVentasEstados', 'url'=>array('index')),
	array('label'=>'Create PreVentasEstados', 'url'=>array('create')),
	array('label'=>'Update PreVentasEstados', 'url'=>array('update', 'id'=>$model->idPreventaEmpresaEstado)),
	array('label'=>'Delete PreVentasEstados', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idPreventaEmpresaEstado),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PreVentasEstados', 'url'=>array('admin')),
);
?>

<h1>View PreVentasEstados #<?php echo $model->idPreventaEmpresaEstado; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idPreventaEmpresaEstado',
		'fecha',
		'idUsuario',
		'comentario',
		'estado',
	),
)); ?>
