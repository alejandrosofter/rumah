<?php
$this->breadcrumbs=array(
	'Facturas Venta Vencimientos',
);

//$this->menu=array(
//	array('label'=>'Create Vencimientos de Factura Venta', 'url'=>array('create')),
//	
//);
?>

<h1>Vencimientos <?php echo $titulo ?></h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'items-factura-saliente-grid',
	'dataProvider'=>$model->buscarVencidas(),
	
	'columns'=>array(
		'cliente',
array(
                  'name'=>'fechaVencimiento',
                    'type'=>'html',
                    'value'=>'Yii::app()->dateFormatter->format("dd-M-y",$data->fechaVencimiento);',
                ),
'estado',
array(
                  'name'=>'diasVencidos',
                    'type'=>'html',
                    'value'=>'$data->diasVencidos<0?"A Vencer ".(-$data->diasVencidos)." días":"Vencido ".$data->diasVencidos." días"',
                ),
array(
                  'name'=>'importeFacturaSaliente',
                    'type'=>'html',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->importeFacturaSaliente,"$")',
                ),
		array(
			'class'=>'CButtonColumn','template' => '{update} {delete}',)
	),
)); ?>