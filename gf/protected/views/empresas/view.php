<?php
$this->breadcrumbs=array(
	'Empresases'=>array('index'),
	$model->idEmpresa,
);

$this->menu=array(
	array('label'=>'List Empresas', 'url'=>array('index')),
	array('label'=>'Create Empresas', 'url'=>array('create')),
	array('label'=>'Update Empresas', 'url'=>array('update', 'id'=>$model->idEmpresa)),
	array('label'=>'Delete Empresas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idEmpresa),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Empresas', 'url'=>array('admin')),
);
?>

<h1>View Empresas #<?php echo $model->idEmpresa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idEmpresa',
		'nombreEmpresa',
		'esDefault',
	),
)); ?>
