<?php
$this->breadcrumbs=array(
	'Facturas Venta Vencimientos',
);

$this->menu=array(
	array('label'=>'Crear Vencimiento', 'url'=>array('create&idFactura='.$_GET['idFacturaSaliente'])),
	
);
?>

<h1>Facturas Venta Vencimientos</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'items-factura-saliente-grid',
	'dataProvider'=>$model->search(),
	
	'columns'=>array(
		
'fechaVencimiento',
'estado',
array(
                  'name'=>'importeFacturaSaliente',
                    'type'=>'html',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->importeFacturaSaliente,"$")',
                ),
		array(
			'class'=>'CButtonColumn','template' => '{update} {delete}',)
	),
)); ?>