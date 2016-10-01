<?php
$this->breadcrumbs=array(
	'Items'
);
?>

<h1>Items de Factura</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'facturas-items-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		array(
                  'name'=>'fecha',
                    'type'=>'html',
                    'value'=>'Yii::app()->dateFormatter->format("dd-M-y",$data->factura->fecha);',
                ),
		'factura.nroFactura',
		'detalle',
		'importe',
		'cantidad'
	),
)); ?>
