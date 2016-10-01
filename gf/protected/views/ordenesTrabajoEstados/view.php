<?php
$this->breadcrumbs=array(
	'Ordenes Trabajo Estadoses'=>array('index'),
	$model->idEstadoOrden,
);

$this->menu=array(
	array('label'=>'List OrdenesTrabajoEstados', 'url'=>array('index')),
	array('label'=>'Create OrdenesTrabajoEstados', 'url'=>array('create')),
	array('label'=>'Update OrdenesTrabajoEstados', 'url'=>array('update', 'id'=>$model->idEstadoOrden)),
	array('label'=>'Delete OrdenesTrabajoEstados', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idEstadoOrden),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrdenesTrabajoEstados', 'url'=>array('admin')),
);
?>

<h1>View OrdenesTrabajoEstados #<?php echo $model->idEstadoOrden; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idEstadoOrden',
		'fechaEstado',
		'idUsuario',
		'idOrdenTrabajo',
		'estado',
		'detalleEstado',
	),
)); ?>
