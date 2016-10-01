<?php
$this->breadcrumbs=array(
	'Alertas Usuarios'=>array('index'),
	$model->idAlertaUsuario,
);

$this->menu=array(
	array('label'=>'List AlertasUsuario', 'url'=>array('index')),
	array('label'=>'Create AlertasUsuario', 'url'=>array('create')),
	array('label'=>'Update AlertasUsuario', 'url'=>array('update', 'id'=>$model->idAlertaUsuario)),
	array('label'=>'Delete AlertasUsuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idAlertaUsuario),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AlertasUsuario', 'url'=>array('admin')),
);
?>

<h1>View AlertasUsuario #<?php echo $model->idAlertaUsuario; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idAlertaUsuario',
		'idAlerta',
		'idUsuario',
	),
)); ?>
