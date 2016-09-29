<?php
$this->breadcrumbs=array(
	'Facturas de Venta'=>array('/facturasSalientes'),
	'Items Factura'
);

$this->menu=array(
	array('label'=>'Imprimir Factura', 'url'=>array('impresiones/create&idTipo='.$idFacturaSaliente.'&tipoImpresion=factura')),
//	array('label'=>'Pagar Factura', 'url'=>array('pagos/pagodirecto&idFactura='.$idFacturaSaliente)),
	array('label'=>'Cerrar Factura', 'url'=>array('facturasSalientes/condicionPago&idFactura='.$idFacturaSaliente)),
//	impresiones/create&idTipo=1&tipoImpresion=factura
);
?>

<h1>Items Factura</h1>
<?php  if(Yii::app()->user->hasFlash('success')):?>
    <div class="info">
        <?php echo "hola"; echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>
<?php echo $this->renderPartial('_form2', array('model'=>$modelo)); ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'items-factura-saliente-grid',
	'dataProvider'=>$model,
	'template'=>"{items}",
	'columns'=>array(
		'cantidad',
		array(
                  'name'=>'nombreItem',
                    'type'=>'html',
                    'value'=>'CHtml::link($data->nombreItem,Yii::app()->createUrl("stock/view",array("id"=>$data->idElemento)))',
                ),
		array(
                  'name'=>'importeItem',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->importeItem,"$")',
                ),
		array(
                  'name'=>'porcentajeIva',
                    'value'=>'Yii::app()->numberFormatter->formatPercentage($data->porcentajeIva)',
                ),
		array(
                  'name'=>'tipoImporte',
                    'type'=>'html',
                    'value'=>'$data->tipoImporte',
                ),
		/*
		'masIva',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>


<div id="columna_left25Form"  >


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'items-factura-sali ente-grid',
	'dataProvider'=>$discriminado,
	'template'=>"{items}",
	'columns'=>array(
		
		array(
                  'name'=>'SubTotal',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->total,"$")',
                ),
        array(
                  'name'=>'Alicuota IVA',
                    'value'=>'($data->porcentajeIva)',
                ),
        array(
                  'name'=>'IVA',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->discrimina,"$")',
                ),
		
		
	),
)); ?>

</div>
<div id="columna_rightForm"  >


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'items-factura-sali ente-grid',
	'dataProvider'=>$total,
	'template'=>"{items}",
	'columns'=>array(
		
		array(
                  'name'=>'SubTotal',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->subTotal,"$")',
                ),
		array(
                  'name'=>'Total',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->total,"$")',
                ),
	),
)); ?>

</div>




