<?php
$this->breadcrumbs=array(
	'Centro de Compras'=>array('/facturasEntrantes/facturas'),'Compras'=>array('/compras'),
	'Ver Compra',
);

$this->menu=array(
	array('label'=>'Listar Compras', 'url'=>array('index')),
	array('label'=>'Nueva Compra', 'url'=>array('create')),
	array('label'=>'Actualizar Compra', 'url'=>array('update', 'id'=>$model->idCompra)),
	array('label'=>'Quitar Compra', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idCompra),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Ver Compra #<?php echo $model->idCompra; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idCompra',
		'fechaCompra',
		'idFacturaEntrante',
		'descripcionCompra',
		'importeDolar',
	),
)); ?>
