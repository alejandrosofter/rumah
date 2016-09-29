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
	//'template'=>"{items}",
	'columns'=>array(

	'cliente',
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
			'class'=>'CButtonColumn','template' => ' {verCompra}',
			'buttons' => array(
			 'verCompra' => array(
                    			'label'=> 'Ver Factura',
                    			'url'=>'Yii::app()->createUrl("/impresiones/create",array("tipoImpresion"=>"factura","idTipo"=>$data->idFacturaSaliente))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/script.png',
                    
                            ),
                            ),
		),
	

	),
)); ?>