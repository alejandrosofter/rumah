<?php
$this->breadcrumbs=array(
	'Impresiones'=>array('index'),
	'Ver Impresión'
);

$this->menu=array(
	array('label'=>'Listar Impresiones', 'url'=>array('index')),
	array('label'=>'Nueva Impresión', 'url'=>array('create')),
	array('label'=>'Actualizar Impresión', 'url'=>array('update', 'id'=>$model->idImpresion)),
	array('label'=>'Quitar Impresión', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idImpresion),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Ver Impresión #<?php echo $model->idImpresion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tipoImpresion',
		'fechaImpresion',
		'textoImpresion:html',
		'fechaLastModifico',
	),
)); ?>
