<?php
$this->breadcrumbs=array(
	'Centro de Productos'=>array('/stock/centroStock'),'Asignacion Precios'=>array('/stockPrecios'),
	'Historial de Compra'
);


?>

<h1>Historial de Compra de Producto</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'compras-items-grid',
	'dataProvider'=>$model,

	'columns'=>array(
		'nombreProveedor',
		'cantidad',
		'alicuotaIva',
		
		
//		'fechaCompra',
		array(
                  'name'=>'fechaCompra',
                    'type'=>'html',
                    'value'=>'($data->fechaCompra=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fechaCompra);',
                ),
		array(
                    'type'=>'html',
                  'name'=>'importeCompra',
                    'value'=>'"<b>".Yii::app()->numberFormatter->formatCurrency($data->importeCompra,"$")."</b>"',
                ),
//		'importeDolarCompra',
		
	),
)); ?>
