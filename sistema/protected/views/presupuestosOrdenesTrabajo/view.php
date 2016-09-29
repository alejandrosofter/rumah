<?php
$this->breadcrumbs=array(
	'Presupuestos Ordenes Trabajos'=>array('index'),
	$model->idPresupuestoOrden,
);

$this->menu=array(
	array('label'=>'List PresupuestosOrdenesTrabajo', 'url'=>array('index')),
	array('label'=>'Create PresupuestosOrdenesTrabajo', 'url'=>array('create')),
	array('label'=>'Update PresupuestosOrdenesTrabajo', 'url'=>array('update', 'id'=>$model->idPresupuestoOrden)),
	array('label'=>'Delete PresupuestosOrdenesTrabajo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idPresupuestoOrden),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PresupuestosOrdenesTrabajo', 'url'=>array('admin')),
);
?>

<h1>View PresupuestosOrdenesTrabajo #<?php echo $model->idPresupuestoOrden; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idPresupuestoOrden',
		'idPresupuesto',
		'idOrdenTrabajo',
		'fecha',
	),
)); ?>
