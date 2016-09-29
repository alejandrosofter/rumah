<?php
$this->breadcrumbs=array(
	'Facturas de Venta'=>array('/facturasSalientes'),
	'Pagos de Factura'
);

$this->menu=array(
	array('label'=>'Nuevo Pago','url'=>array('create&idFactura='.$idFacturaSaliente.'&idCliente='.$idCliente.'&restante='.$restante)),
	array('label'=>'Nueva Factura','url'=>array('/facturasEntrantes/create')),
);
?>

<h1>Pagos Factura</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pagos-grid',
	'dataProvider'=>$data,
	'columns'=>array(

//		'fecha',
		array(
                  'name'=>'fecha',
                    'type'=>'html',
                    'value'=>'($data->fecha=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fecha);',
                ),
		'formaPago',
		'nombreCuenta',
		array(
                  'name'=>'importeDinero',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->importeDinero,"$")',
                ),

		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
