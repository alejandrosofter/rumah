<?php
$this->breadcrumbs=array(
'Facturas de Compra'=>array('/facturasEntrantes/'),
	'Items de Factura',
);

$this->menu=array(
	array('label'=>'Volver a Facturas', 'url'=>array('/facturasEntrantes')),
    array('label'=>'Nueva Factura de CONCEPTOS', 'url'=>array('/facturasEntrantes/crearParaConceptos')),
);
?>

<h1>Conceptos</h1>
Conceptos inputados en la factura.
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'conceptos-grid',
	'dataProvider'=>$model->consultarPorFactura($idFactura),
	'template'=>'{items}',
	'columns'=>array(
		array(
                  'name'=>'nombreConcepto',
                    'type'=>'html',
                    'value'=>'$data->nombreConcepto." (".$data->detalle.")"'),
array(
                  'name'=>'alicuotaIva',
                    'type'=>'html',
                    'value'=>'Yii::app()->numberFormatter->formatPercentage($data->alicuotaIva)',
                ),
		array(
                  'name'=>'importe',
                    'type'=>'html',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->importe,"$")',
                ),
        
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>


