<?php
$this->breadcrumbs=array(
	'Presupuesto Items'=>array('index'),
	$model->idItemPresupuesto,
);

$this->menu=array(
	array('label'=>'List PresupuestoItems', 'url'=>array('index')),
	array('label'=>'Create PresupuestoItems', 'url'=>array('create')),
	array('label'=>'Update PresupuestoItems', 'url'=>array('update', 'id'=>$model->idItemPresupuesto)),
	array('label'=>'Delete PresupuestoItems', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idItemPresupuesto),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PresupuestoItems', 'url'=>array('admin')),
);
?>

<h1>View PresupuestoItems #<?php echo $model->idItemPresupuesto; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idItemPresupuesto',
		'idPresupuesto',
		'idStock',
		'precioVenta',
		'nombreStock',
		'cantidadItems',
		'porcentajeIva',
	),
)); ?>
