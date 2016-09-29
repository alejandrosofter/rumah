<?php
$this->breadcrumbs=array(
	'Valor Monedas'=>array('index'),
	$model->idValorMoneda,
);

$this->menu=array(
	array('label'=>'List ValorMoneda', 'url'=>array('index')),
	array('label'=>'Create ValorMoneda', 'url'=>array('create')),
	array('label'=>'Update ValorMoneda', 'url'=>array('update', 'id'=>$model->idValorMoneda)),
	array('label'=>'Delete ValorMoneda', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idValorMoneda),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ValorMoneda', 'url'=>array('admin')),
);
?>

<h1>View ValorMoneda #<?php echo $model->idValorMoneda; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idValorMoneda',
		'idTipoMoneda',
		'fecha',
		'valorCompra',
		'valorVenta',
	),
)); ?>
