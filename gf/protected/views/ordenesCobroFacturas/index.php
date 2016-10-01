<?php
$this->breadcrumbs=array(
	'Ordenes Cobro Facturas',
);

//$this->menu=array(
//	array('label'=>'Crear Orden de Cobro Facturas', 'url'=>array('create')),
//);
?>

<h1>Orden de Cobro Facturas</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'items-factura-saliente-grid',
	'dataProvider'=>$model->search(),
	
	'columns'=>array(
		
		 array(
                  'name'=>'factura',
                    'type'=>'html',
                    'value'=>'$data->factura',
                ),
		array(
                  'name'=>'vencimiento',
                    'type'=>'html',
                    'value'=>'Yii::app()->dateFormatter->format("dd-M-y",$data->vencimiento)',
                ),
		array(
                  'name'=>'importe',
                    'type'=>'html',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->importeCobroFactura,"$")',
                ),
        array(
                  'name'=>'estado',
                    'type'=>'html',
                    'value'=>'$data->estado',
                ),
		array(
			'class'=>'CButtonColumn','template' => '{delete}',)
	),
)); ?>