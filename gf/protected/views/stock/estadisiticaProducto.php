<?php
$this->breadcrumbs=array(
	'Centro de Productos'=>array('centroStock'),'Estadistica de producto'
);

?>

<h1>Compras</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'compras-items-grid',
	'dataProvider'=>$compras,
	//'template'=>"{items}",
	'columns'=>array(
array(
                  'name'=>'nombreProveedor',
                    'type'=>'html',
                    'value'=>'CHtml::link($data->nombreProveedor,Yii::app()->createUrl("proveedores/update",array("id"=>$data->nombreProveedor)))',
                ),
		'fechaCompra',
		'cantidad',
		array(
                  'name'=>'importeCompra',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->importeCompra,"$")',
                ),
        array(
			'class'=>'CButtonColumn','template' => ' {verCompra}',
			'buttons' => array(
			 'verCompra' => array(
                    			'label'=> 'Ver Compra',
                    			'url'=>'Yii::app()->createUrl("comprasItems",array("idFactura"=>$data->idFacturaEntrante))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/lorry.png',
                    
                            ),
                            ),
		),
		

	),
)); ?>

<h1>Ventas</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'items-factura-saliente-grid',
	'dataProvider'=>$ventas,
	'columns'=>array(

	
		'cantidad',
		array(
                  'name'=>'Cliente',
                    'type'=>'html',
                   'value'=>'isset($data->factura->cliente)?$data->factura->cliente->razonSocial:("sin cliente".$data->factura->idCliente)',
                ),
		array(
                  'name'=>'Producto',
                    'type'=>'html',
                    'value'=>'CHtml::link($data->detalle,Yii::app()->createUrl("stock/view",array("id"=>$data->idProducto)))',
                ),
		array(
                  'name'=>'Importe',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->importe,"$")',
                ),
		array(
                  'name'=>'Total',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->total,"$")',
                ),
        array(
			'class'=>'CButtonColumn','template' => ' {verCompra}',
			'buttons' => array(
			 'verCompra' => array(
                    			'label'=> 'Ver Factura',
                    			'url'=>'Yii::app()->createUrl("/facturasItems/admin",array("tipoImpresion"=>"factura","idFactura"=>$data->idFactura))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/script.png',
                    
                            ),
                            ),
		),
	

	),
)); ?>