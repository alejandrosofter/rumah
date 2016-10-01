<?php
$this->breadcrumbs=array(
	'Reloj Resultado Horases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RelojResultadoHoras', 'url'=>array('index')),
	array('label'=>'Create RelojResultadoHoras', 'url'=>array('create')),
	array('label'=>'Update RelojResultadoHoras', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RelojResultadoHoras', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RelojResultadoHoras', 'url'=>array('admin')),
);
?>

<h1>View RelojResultadoHoras #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'idEmpleado',
		'fechaInicio',
		'fechaFin',
	),
)); ?>
