<?php
$this->breadcrumbs=array(
	'Centro de Ventas'=>array('centroVentas'),'Facturas de Venta'=>array('index'),
	'Ver factura'
);

$this->menu=array(
	array('label'=>'Listar Facturas', 'url'=>array('index')),
	array('label'=>'Nueva Factura', 'url'=>array('create')),
	array('label'=>'Actualizar Factura', 'url'=>array('update', 'id'=>$model->idFacturaSaliente)),
	array('label'=>'Quitar Factura', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idFacturaSaliente),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Ver Factura #<?php echo $model->idFacturaSaliente; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idFacturaSaliente',
		'idCliente',
		'fecha',
		'numeroFactura',
		'descripcion',
		'estado',
		'tipoFactura',
		'idCentroCosto',
		'fechaEstimadaCobro',
	),
)); ?>
