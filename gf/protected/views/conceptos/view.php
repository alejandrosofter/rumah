<?php
$this->breadcrumbs=array(
	'Conceptos'=>array('index'),
	$model->idConcepto,
);

$this->menu=array(
	array('label'=>'Listar Conceptos', 'url'=>array('index')),
	array('label'=>'Nuevo Conceptos', 'url'=>array('create')),
	array('label'=>'Actualizar Conceptos', 'url'=>array('update', 'id'=>$model->idConcepto)),
	array('label'=>'Quitar Conceptos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idConcepto),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Ver Concepto #<?php echo $model->idConcepto; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idConcepto',
		'nombreConcepto',
		'idCuentaContable',
		'codigoConcepto',
	),
)); ?>
