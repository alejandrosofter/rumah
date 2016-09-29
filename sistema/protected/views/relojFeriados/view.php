<?php
$this->breadcrumbs=array(
	'Reloj'=>array('RelojCategorias/menuAlternativo'),
	'Feriados'=>array('admin'),
	$model->idFeriado,
);

$this->menu=array(
	array('label'=>'Agregar feriados', 'url'=>array('create')),
	array('label'=>'Actualizar feriados', 'url'=>array('update', 'id'=>$model->idFeriado)),
	array('label'=>'Eliminar feriados', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idFeriado),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Volver a feriados', 'url'=>array('admin')),
);
?>

<h1>Ver feriados #<?php echo $model->idFeriado; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idFeriado',
		'fechaFeriado',
		'comentarioFeriado',
	),
)); ?>
