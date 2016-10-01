<?php
$this->breadcrumbs=array(
	'Centros Costos'=>array('index'),
	$model->idCentroCosto,
);

$this->menu=array(
	array('label'=>'List CentrosCosto', 'url'=>array('index')),
	array('label'=>'Create CentrosCosto', 'url'=>array('create')),
	array('label'=>'Update CentrosCosto', 'url'=>array('update', 'id'=>$model->idCentroCosto)),
	array('label'=>'Delete CentrosCosto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idCentroCosto),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CentrosCosto', 'url'=>array('admin')),
);
?>

<h1>View CentrosCosto #<?php echo $model->idCentroCosto; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idCentroCosto',
		'nombre',
	),
)); ?>
