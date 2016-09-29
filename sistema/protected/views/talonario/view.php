<?php
$this->breadcrumbs=array(
	'Talonarios'=>array('index'),
	$model->idTalonario,
);

$this->menu=array(
	array('label'=>'Listar Talonario', 'url'=>array('index')),
	array('label'=>'Crear Talonario', 'url'=>array('create')),
	array('label'=>'Actualizar Talonario', 'url'=>array('update', 'id'=>$model->idTalonario)),
	array('label'=>'Eliminar Talonario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idTalonario),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Ver Talonario #<?php echo $model->idTalonario; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idTalonario',
		'idPuntoVenta',
		'desdeNumero',
		'hastaNumero',
		'proximo',
		'letraTalonario',
		'tipoTalonario',
		'numeroSerie',
	),
)); ?>
