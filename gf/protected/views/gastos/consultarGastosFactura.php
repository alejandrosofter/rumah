<?php
$this->breadcrumbs=array(
	'Pagos'=>array('/gastos'),'Gastos de Factura'
);

$this->menu=array(
	array('label'=>'Nuevo Pago', 'url'=>array('create&idFactura='.$idFactura.'&restante='.$restante)),
	array('label'=>'Listar Pagos', 'url'=>array('index')),
	array('label'=>'Ver Cuentas', 'url'=>array('/cuentasEfectivo')),
	
);
?>

<h1>Pagos sobre Factura</h1>
Listado de pagos que ha recibido la factura:
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gastos-grid',
	'dataProvider'=>$model,
	'columns'=>array(
		'nombreProveedor',
		'fecha',
		'detalle',
		'formaPago',
		array(
                  'name'=>'importe',
                    'type'=>'html',
                    'value'=>'"$ ".$data->importe',
                ),
		
		/*
		'idCuentaEfectivo',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
