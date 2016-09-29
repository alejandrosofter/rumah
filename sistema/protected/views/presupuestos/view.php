<?php
$this->breadcrumbs=array(
	'Presupuestos'=>array('index'),
	$model->idPresupuesto,
);

$this->menu=array(
	array('label'=>'Listar Presupuestos', 'url'=>array('index')),
	array('label'=>'Nuevo Presupuest', 'url'=>array('create')),
	array('label'=>'Actualizar Presupuesto', 'url'=>array('update', 'id'=>$model->idPresupuesto)),
	array('label'=>'Quitar Presupuesto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idPresupuesto),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Ver Presupuesto #<?php echo $model->idPresupuesto; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idPresupuesto',
		'fechaPresupuesto',
		'descripcionPresupuesto',
		'asuntoPresupuesto',
		'fechaVencimiento',
		'precioEspecial',
		'formaPago',
		'fechaentrega',
		'porcentajeIva',
		'estado',
		'tipoPresupuesto',
	),
)); ?>
