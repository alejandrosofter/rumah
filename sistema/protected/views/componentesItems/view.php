<?php
$this->breadcrumbs=array(
	'Componentes Items'=>array('index'),
	$model->idItemComponente,
);

$this->menu=array(
	array('label'=>'List ComponentesItems', 'url'=>array('index')),
	array('label'=>'Create ComponentesItems', 'url'=>array('create')),
	array('label'=>'Update ComponentesItems', 'url'=>array('update', 'id'=>$model->idItemComponente)),
	array('label'=>'Delete ComponentesItems', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idItemComponente),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ComponentesItems', 'url'=>array('admin')),
);
?>

<h1>View ComponentesItems #<?php echo $model->idItemComponente; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idItemComponente',
		'idStock',
		'idComponente',
	),
)); ?>
