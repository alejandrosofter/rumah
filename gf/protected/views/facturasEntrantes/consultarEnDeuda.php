<?php
$this->breadcrumbs=array(
	'Facturas'=>array('/facturasEntrantes/facturas'),'Facturas de Compra(en Deuda)'
);

$this->menu=array(
	array('label'=>'Facturas ('.($modelo->search()->getTotalItemCount()).")", 'url'=>array('/facturasEntrantes')),
	array('label'=>'En Deuda ('.($modelo->consultarEnDeuda()->getTotalItemCount()).")", ),
	array('label'=>'Para Pagar ('.($modelo->consultarParaPagar()->getTotalItemCount()).")", 'url'=>array('/facturasEntrantes/consultarParaPagar')),
	array('label'=>'Nueva Factura de Compra', 'url'=>array('create')),

);
?>

<h1>FACTURAS DE COMPRA (EN DEUDA)</h1>
Listado de Facturas de Compra sobre la empresa:
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'facturas-entrantes-grid',
	'dataProvider'=>$model->consultarEnDeuda(),
	'filter'=>$model,
	'columns'=>array(

		 array(
                        'header'=>'Proveedor',
                        'name'=>'proveedores.nombre',
                        'filter'=>CHtml::textField('nombre',(isset($_GET['nombre']) ? $_GET['nombre'] : "")),
                        'value'=>'$data->proveedores->nombre',
                		'type'=>'raw',
                ),
//		'fecha',
		array(
                  'name'=>'fecha',
                    'type'=>'html',
                    'value'=>'($data->fecha=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fecha);',
                ),
		'tipoFactura',
		'numeroFactura',
		'precio',
		array(
                  'name'=>'cantidadPagos',
                    'type'=>'html',
                    'value'=>'CHtml::link("$".$data->importePagos." (".$data->cantidadPagos.")",
                    Yii::app()->createUrl("gastos/consultarGastosFacturaDeuda",
                    array("idFactura"=>$data->idFacturaEntrante,"importeFactura"=>$data->precio ,
                    "precio"=>$data->importePagos)))',
                ),
//		array(
//                  'name'=>'cantidadPagos',
//                    'type'=>'html',
//                    'value'=>'CHtml::link("$".$data->importePagos." (".$data->cantidadPagos.")",Yii::app()->createUrl("gastos/consultarGastosFactura",array("idFactura"=>$data->idFacturaEntrante)))',
//                ),
		/*
		'descripcion',
		'estado',
		'tipoFactura',
		'idCentroCosto',
		'iva21',
		'iva105',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
