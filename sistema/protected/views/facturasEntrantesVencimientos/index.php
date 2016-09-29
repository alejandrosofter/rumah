<?php
$this->breadcrumbs=array(
	'Facturas Entrantes Vencimientos',
);

$this->menu=array(
	array('label'=>'Crea un Vencimiento', 'url'=>array('create&idFactura='.$_GET['idFacturaEntrante'])),
//	array('label'=>'Manage FacturasEntrantesVencimientos', 'url'=>array('admin')),
);
?>

<h1>Facturas Entrantes Vencimientos</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'items-factura-saliente-grid',
	'dataProvider'=>$model->search(),
	
	'columns'=>array(
		
'fechaVencimiento',
'estado',
array(
                  'name'=>'importe',
                    'type'=>'html',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->importe,"$")',
                ),

	
	array(
			'class'=>'CButtonColumn','template' => '{update} {delete}',)
	),
)); ?>