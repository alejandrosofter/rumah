<?php
$this->breadcrumbs=array(
	'Juridicciones'=>array('index'),
	$model->idJuridiccion,
);

$this->menu=array(
	array('label'=>'Listar Juridicciones', 'url'=>array('index')),
	array('label'=>'Crear Juridicciones', 'url'=>array('create')),
	array('label'=>'Modificar Juridicciones', 'url'=>array('update', 'id'=>$model->idJuridiccion)),
	array('label'=>'Eliminar Juridicciones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idJuridiccion),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Ver Juridicciones #<?php echo $model->idJuridiccion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idJuridiccion',
		'nombreJuridiccion',
		'codigoJuridiccion',
	),
)); ?>
