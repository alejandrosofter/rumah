<?php
$this->breadcrumbs=array(
	'Facturas Salientes Corrientes',
);

$this->menu=array(
	array('label'=>'Nueva Factura Corriente', 'url'=>array('/facturasSalientes/crearFacturaCte')),
);
?>

<h1>Facturas Salientes Corrientes</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'facturas-salientes-corriente-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'class'=>'CButtonColumn','template' => '{factura}',
			'header' => 'Factura',
			'buttons' => array(
			 'factura' => array(
                    			'label'=>'Factura',
                    			'url'=>'Yii::app()->createUrl("facturasSalientes/update",array("id"=>$data->idFacturaSaliente))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/script.png',
                    
                            ),
                            
                           
		)),
		'cliente',
		'fechaDesde',
		'fechaHasta',
		'estadoFactura',
		'periodicidad',
		 array(
                  'name'=>'importe',
                    'type'=>'html',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->importe,"$")',
                ),
		array(
			'class'=>'CButtonColumn','template' => '{generar}{items} {view} {update} {delete}',
			'buttons' => array(
			 'generar' => array(
                    			'label'=>'Generar',
                    			'url'=>'Yii::app()->createUrl("facturasSalientes/generarFacturaCte",array("tipoFactura"=>$data->tipoFactura,"estado"=>$data->estadoFactura,"idCliente"=>$data->idCliente,"idFacturaSaliente"=>$data->idFacturaSaliente,"idFacturaSalienteCorriente"=>"$data->idFacturaSalienteCorriente"))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/arrow_branch.png',
                    
                            ),
                            'items' => array(
                    			'label'=>'Items',
                    			'url'=>'Yii::app()->createUrl("itemsFacturaSaliente/",array("idFacturaSaliente"=>$data->idFacturaSaliente))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/basket_put.png',
                    
                            ),
                            ),
		)
	),
)); ?>