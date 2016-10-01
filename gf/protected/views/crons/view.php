<?php
$this->breadcrumbs=array(
	'Crons'=>array('index'),
	$model->idCron,
);

$this->menu=array(
	array('label'=>'List Crons', 'url'=>array('index')),
	array('label'=>'Create Crons', 'url'=>array('create')),
	array('label'=>'Update Crons', 'url'=>array('update', 'id'=>$model->idCron)),
	array('label'=>'Delete Crons', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idCron),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Crons', 'url'=>array('admin')),
);
?>

<h1>View Crons #<?php echo $model->idCron; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idCron',
		'minutos',
		'horas',
		'dias',
		'meses',
		'diasSemana',
		'script',
		'parametros',
		'nombre',
		'descripcion',
	),
)); ?>
