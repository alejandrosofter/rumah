<?php
$this->breadcrumbs=array(
	'Componentes'=>array('index'),
	$model->idComponente,
);

$this->menu=array(
	array('label'=>'List Componentes', 'url'=>array('index')),
	array('label'=>'Create Componentes', 'url'=>array('create')),
	array('label'=>'Update Componentes', 'url'=>array('update', 'id'=>$model->idComponente)),
	array('label'=>'Delete Componentes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idComponente),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Componentes', 'url'=>array('admin')),
);
?>

<h1>View Componentes #<?php echo $model->idComponente; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idComponente',
		'idStock',
	),
)); ?>
