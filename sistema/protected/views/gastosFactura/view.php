<?php
$this->breadcrumbs=array(
	'Pagos'=>array('index'),
	$model->idGastoFactura,
);

$this->menu=array(
	array('label'=>'Listar Asignaciones', 'url'=>array('index')),
	array('label'=>'Actualizar Asignaciones', 'url'=>array('update', 'id'=>$model->idGastoFactura)),
	array('label'=>'Quitar Asignación', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idGastoFactura),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Ver Asignación #<?php echo $model->idGastoFactura; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idGasto',
		'idFacturaSaliente',
		'estado',
	),
)); ?>
