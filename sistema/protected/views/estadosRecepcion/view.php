<?php
$this->breadcrumbs=array(
	'Estados Recepcions'=>array('index'),
	$model->idEstadoRecepcion,
);

$this->menu=array(
	array('label'=>'List EstadosRecepcion', 'url'=>array('index')),
	array('label'=>'Create EstadosRecepcion', 'url'=>array('create')),
	array('label'=>'Update EstadosRecepcion', 'url'=>array('update', 'id'=>$model->idEstadoRecepcion)),
	array('label'=>'Delete EstadosRecepcion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idEstadoRecepcion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EstadosRecepcion', 'url'=>array('admin')),
);
?>

<h1>View EstadosRecepcion #<?php echo $model->idEstadoRecepcion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idEstadoRecepcion',
		'idRecepcion',
		'fechaEstadoRecepcion',
		'descripcionEstadoRecepcion',
		'idUsuarioEstado',
		'estadoEstadoRecepcion',
	),
)); ?>
