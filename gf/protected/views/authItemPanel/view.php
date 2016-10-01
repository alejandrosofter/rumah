<?php
$this->breadcrumbs=array(
	'Auth Item Panels'=>array('index'),
	$model->rol,
);

$this->menu=array(
	array('label'=>'List AuthItemPanel', 'url'=>array('index')),
	array('label'=>'Create AuthItemPanel', 'url'=>array('create')),
	array('label'=>'Update AuthItemPanel', 'url'=>array('update', 'id'=>$model->rol)),
	array('label'=>'Delete AuthItemPanel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rol),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AuthItemPanel', 'url'=>array('admin')),
);
?>

<h1>View AuthItemPanel #<?php echo $model->rol; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'rol',
		'panel',
	),
)); ?>
