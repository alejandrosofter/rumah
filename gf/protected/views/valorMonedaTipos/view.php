<?php
$this->breadcrumbs=array(
	'Valor Moneda Tiposes'=>array('index'),
	$model->idValorMonedaTipo,
);

$this->menu=array(
	array('label'=>'Listar Tipos', 'url'=>array('index')),
	array('label'=>'Nuevo Tipo', 'url'=>array('create')),
	array('label'=>'Actualizar Tipo', 'url'=>array('update', 'id'=>$model->idValorMonedaTipo)),
	array('label'=>'Quitar Tipo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idValorMonedaTipo),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Ver Tipo #<?php echo $model->idValorMonedaTipo; ?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'valor-moneda-tipos-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'idValorMonedaTipo',
		'nombreMoneda',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
