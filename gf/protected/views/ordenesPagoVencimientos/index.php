<?php
$this->breadcrumbs=array(
'Pagos'=>array('/ordenesPago'),
	'Liquidacion de Facturas',
);

?>

<h1>Imputación de Facturas</h1>
<i>Visualice la/s factura/s imputadas sobre la orden de pago. Luego de cancelar vencimientos el sistema automaticamente va a cancelar la factura correspondiente. </i>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ordenes-pago-vencimientos-grid',
	'dataProvider'=>$model->search(),
	'template'=>'{items}',
	//'filter'=>$model,
	'columns'=>array(

		 array(
                  'name'=>'factura',
                    'type'=>'html',
                    'value'=>'CHtml::link($data->factura,
                    Yii::app()->createUrl("comprasItems",array("idFactura"=>$data->idFacturaEntrante)))',
                ),
		array(
                  'name'=>'vencimiento',
                    'type'=>'html',
                    'value'=>'Yii::app()->dateFormatter->format("dd-M-y",$data->vencimiento)',
                ),
		array(
                  'name'=>'importe',
                    'type'=>'html',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->importe,"$")',
                ),
        array(
                  'name'=>'estado',
                    'type'=>'html',
                    'value'=>'$data->estado',
                )
	),
)); ?>
