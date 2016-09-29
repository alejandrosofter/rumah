<?php

$this->breadcrumbs=array(
	'Centro de Compras'=>array('/facturasEntrantes/facturas'),'Facturas de Compra'
);

$this->menu=array(
	array('label'=>'Facturas ('.($modelo->search()->getTotalItemCount()).")"),

	array('label'=>'Nueva Factura de Compra', 'url'=>array('create')),
	
	//array('label'=>'Dialogo', 'url'=>array('/stockPreciosItems/create'), 
	//'linkOptions'=>array('onclick'=>'$("#mydialog").dialog("open"); return false;')),
);
?>

<h1>FACTURAS DE COMPRA STOCK</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'facturas-entrantes-grid',
	'dataProvider'=>$model->buscarCompraStock(),
	'filter'=>$model,
	'columns'=>array(
	
                 array(
                  'name'=>'proveedor',
                    'type'=>'html',
                    'value'=>'CHtml::link($data->proveedores->nombre,
                    Yii::app()->createUrl("proveedores/view",array("id"=>$data->proveedores->idProveedor)))',
                    'filter'=>CHtml::textField('nombre',(isset($_GET['nombre']) ? $_GET['nombre'] : "")),
                ),
                
                
		array(
                  'name'=>'fecha',
                    'type'=>'html',
                    'value'=>'Yii::app()->dateFormatter->format("dd-M-y",$data->fecha);',
                ),
                 array(
                        'header'=>'Fecha Carga',
                        'name'=>'fechaCargaPrecios',
                        'filter'=>'',
                        
                       // 'value'=>'Yii::app()->dateFormatter->format("dd-M-y",$data->fechaCargaPrecios);',
                		'type'=>'raw',
                ),
	
		
		array(
                  'name'=>'precio',
                    'type'=>'html',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->importe,"$")',
                ),
	
                array(
                        'header'=>'Precios Cargados',
                        'name'=>'preciosCargados',
                        'filter'=>'',
                        
                        'value'=>'$data->preciosCargados',
                		'type'=>'raw',
                ),
		/*
		'descripcion',
		'estado',
		'tipoFactura',
		'idCentroCosto',
		'iva21',
		'iva105',
		*/
		array(
			'class'=>'CButtonColumn','template' => '{aplicar} {items} ',
			'buttons' => array(
                            'aplicar' => array(
                    			'label'=>'Aplicar Precio',
                    			'url'=>'Yii::app()->createUrl("stockPrecios/asignarCompra",
                    			array("id"=>$data->idFacturaEntrante))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/money.png',
                    
                            ),
                            'items' => array(
                    			'label'=>'Items',
                    			'url'=>'Yii::app()->createUrl("facturasEntrantes/verItems",
                    			array("idFactura"=>$data->idFacturaEntrante))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/basket.png',
                    
                            ),
								'pagar' => array(
                    			'label'=>'Pagar',
                    			'url'=>'Yii::app()->createUrl("gastos/create",
                    			array("idFactura"=>$data->idFacturaEntrante,"restante"=>$data->importePagos))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/money_add.png',
                    
                            ),
                            ),
		),
	),
)); ?>

<span class="help-block">
Para la <b>busqueda</b> por fecha existen 3 posibilidades rango,mes y fecha:<br>
RANGO: sintaxis <b><i> rango 2011-09-01 y 2011-10-01 </i></b> <br>
MES: sintaxis  <b><i> mes 09-2011 </i></b> <br> 
DIA: sintaxis  <b><i> dia 2011-09-05 </i> </b></span>
