<?php
$this->breadcrumbs=array(
	'Formas De Pagos'=>array('index'),
	$model->idFormaPago,
);

$this->menu=array(
	array('label'=>'List FormasDePago', 'url'=>array('index')),
	array('label'=>'Create FormasDePago', 'url'=>array('create')),
	array('label'=>'Update FormasDePago', 'url'=>array('update', 'id'=>$model->idFormaPago)),
	array('label'=>'Delete FormasDePago', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idFormaPago),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FormasDePago', 'url'=>array('admin')),
);
?>

<h1>View FormasDePago #<?php echo $model->idFormaPago; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idFormaPago',
		'nombreForma',
		'tipoForma',
		'cantidadCuotas',
		'intereses',
		'ingresoEgreso',
	),
)); ?>
