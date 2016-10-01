<?php
$this->breadcrumbs=array(
	'Centro de Ventas'=>array('centroVentas'),'Facturas de Venta',
);

$this->menu=array(
	
	array('label'=>"Para Cobrar(".($model->buscarEstado('Para Pagar')->getTotalItemCount()).")", 'url'=>array('buscarEstado&estado=Para Pagar')),
	array('label'=>"Pagadas(".($model->buscarEstado('Pagada')->getTotalItemCount()).")", 'url'=>array('buscarEstado&estado=Pagada')),
	array('label'=>"Debiendo(".($model->buscarEstado('Debiendo')->getTotalItemCount()).")", 'url'=>array('buscarEstado&estado=Debiendo')),
	array('label'=>'Libro IVA Ventas', 'url'=>array('/facturasSalientes/consultarLibroIva&tipoLibro=A&mes=5&ano=2011')),
	array('label'=>'Nueva Factura', 'url'=>array('create')),
);
?>

<h1>FACTURAS COBRAR(<?php echo $estado ?>)</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'facturas-salientes-grid',
	'dataProvider'=>$model->buscarEstado($estado),
	'filter'=>$model,
	'columns'=>array(
	
                
                array(
                  'name'=>'cliente',
                    'type'=>'html',
                    'value'=>'CHtml::link($data->cliente,
                    Yii::app()->createUrl("clientes/view",array("id"=>$data->idCliente)))',
                ),
//		'fecha',
		array(
                  'name'=>'fecha',
                    'type'=>'html',
		 'filter'=>CHtml::textField('fecha',(isset($_GET['fecha']) ? $_GET['fecha'] : "")),
                    'value'=>'($data->fecha=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fecha);',
                ),
        array(
                        'header'=>'Nro Factura',
                        'name'=>'numeroFactura',
                        'filter'=>CHtml::textField('numeroFactura',(isset($_GET['numeroFactura']) ? $_GET['numeroFactura'] : "")),
                        'value'=>'$data->numeroFactura',
                		'type'=>'raw',
                ),
                array(
                        'header'=>'tipoFactura',
                        'name'=>'tipoFactura',
                        'filter'=>CHtml::textField('tipoFactura',(isset($_GET['tipoFactura']) ? $_GET['tipoFactura'] : "")),
                        'value'=>'$data->tipoFactura',
                		'type'=>'raw',
                ),
               
		'estado',
		array(
                  'name'=>'pagos',
                    'type'=>'html',
                    'value'=>'CHtml::link(Yii::app()->numberFormatter->formatCurrency($data->pagos,"$"),
                    Yii::app()->createUrl("pagos/consultarPagosFactura",
                    array("idFacturaSaliente"=>$data->idFacturaSaliente,"importeFactura"=>$data->importeFactura)))',
                ),
        array(
                  'name'=>'importeFactura',
                    'type'=>'html',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->importeFactura,"$")',
                ),
		array(
			'class'=>'CButtonColumn','template' => '{pagar} {imprimir} {items} {view} {update} {delete}',
			'buttons' => array(
			 'pagar' => array(
                    			'label'=>'Pagar',
                    			'url'=>'Yii::app()->createUrl("pagos/create",array("idFactura"=>$data->idFacturaSaliente,"idCliente"=>$data->idCliente,"restante"=>$data->importeFactura-$data->pagos))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/money.png',
                    
                            ),
			 'imprimir' => array(
                    			'label'=>'Imprimir',
                    			'url'=>'Yii::app()->createUrl("impresiones/create",array("idTipo"=>$data->idFacturaSaliente,"tipoImpresion"=>"factura",
                    						"nombreFactura"=>$data->tipoFactura))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/printer.png',
                    
                            ),
                            'items' => array(
                    			'label'=>'Items',
                    			'url'=>'Yii::app()->createUrl("itemsFacturaSaliente/",array("idFacturaSaliente"=>$data->idFacturaSaliente))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/basket_put.png',
                    
                            ),
                            ),
		),
	),
)); ?>