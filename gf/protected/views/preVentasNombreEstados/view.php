<?php
$this->breadcrumbs=array(
	'Pre Ventas Nombre Estadoses'=>array('index'),
	$model->idPreventaEmpresaNombreEstado,
);

$this->menu=array(
	array('label'=>'List PreVentasNombreEstados', 'url'=>array('index')),
	array('label'=>'Create PreVentasNombreEstados', 'url'=>array('create')),
	array('label'=>'Update PreVentasNombreEstados', 'url'=>array('update', 'id'=>$model->idPreventaEmpresaNombreEstado)),
	array('label'=>'Delete PreVentasNombreEstados', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idPreventaEmpresaNombreEstado),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PreVentasNombreEstados', 'url'=>array('admin')),
);
?>

<h1>View PreVentasNombreEstados #<?php echo $model->idPreventaEmpresaNombreEstado; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idPreventaEmpresaNombreEstado',
		'nombreEstado',
	),
)); ?>
