<?php
$this->breadcrumbs=array(
	'Alertases'=>array('index'),
	$model->idAlerta,
);

$this->menu=array(
	array('label'=>'List Alertas', 'url'=>array('index')),
	array('label'=>'Create Alertas', 'url'=>array('create')),
	array('label'=>'Update Alertas', 'url'=>array('update', 'id'=>$model->idAlerta)),
	array('label'=>'Delete Alertas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idAlerta),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Alertas', 'url'=>array('admin')),
);
?>

<h1>View Alertas #<?php echo $model->idAlerta; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idAlerta',
		'titulo',
		'descripcion',
		'nivelAlerta',
		'tipoAlerta',
		'estadoAlerta',
		'fechaVencimiento',
		'linkSolucion',
	),
)); ?>
