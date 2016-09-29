<?php
$this->breadcrumbs=array(
	'Centro de Productos'=>array('centroStock'),'Asignacion Precios'=>array('/stockPrecios'),
'Ver Asignacion'
);

$this->menu=array(
	array('label'=>'Listar Asignaciones', 'url'=>array('index')),
	array('label'=>'Nueva Asignación', 'url'=>array('create')),
	array('label'=>'Actualizar Asignación', 'url'=>array('update', 'id'=>$model->idStockPrecio)),
	array('label'=>'Quitar Asignación', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idStockPrecio),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Ver Asignación #<?php echo $model->idStockPrecio; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'fechaStock',
		'tipo',
		'idTipo',
	),
)); ?>
