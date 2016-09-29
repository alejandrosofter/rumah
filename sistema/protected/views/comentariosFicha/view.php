<?php
$this->breadcrumbs=array(
	'Comentarios Fichas'=>array('index'),
	$model->idComentarioFicha,
);

$this->menu=array(
	array('label'=>'List ComentariosFicha', 'url'=>array('index')),
	array('label'=>'Create ComentariosFicha', 'url'=>array('create')),
	array('label'=>'Update ComentariosFicha', 'url'=>array('update', 'id'=>$model->idComentarioFicha)),
	array('label'=>'Delete ComentariosFicha', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idComentarioFicha),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ComentariosFicha', 'url'=>array('admin')),
);
?>

<h1>View ComentariosFicha #<?php echo $model->idComentarioFicha; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idComentarioFicha',
		'tipo',
		'idTipo',
		'fechaComentario',
		'detalleComentario',
		'idUsuario',
	),
)); ?>
