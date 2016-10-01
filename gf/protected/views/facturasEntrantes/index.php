<?php

$this->breadcrumbs=array(
	'Centro de Compras'=>array('/facturasEntrantes/facturas'),'Facturas de Compra'
);

$this->menu=array(
	array('label'=>'Facturas ('.($modelo->search()->getTotalItemCount()).")"),

	array('label'=>'Nueva Factura de STOCK', 'url'=>array('crearParaStock')),
    array('label'=>'Nueva Factura de CONCEPTOS', 'url'=>array('crearParaConceptos')),
	
	//array('label'=>'Dialogo', 'url'=>array('/stockPreciosItems/create'), 
	//'linkOptions'=>array('onclick'=>'$("#mydialog").dialog("open"); return false;')),
);
?>

<h1>FACTURAS DE COMPRA</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'facturas-entrantes-grid',
    'ajaxUpdate'=>false,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
                        'header'=>'ID',
                        'name'=>'idFacturaEntrante',
                        
                        'value'=>'$data->idFacturaEntrante',
                        'type'=>'raw',
                ),
	
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
                        'header'=>'Tipo Factura',
                        'name'=>'tipoFactura',
                        'filter'=>FacturasEntrantes::getTipoFacturas(),
                        'value'=>'$data->tipoFactura',
                		'type'=>'raw',
                ),
		array(
                        'header'=>'Nro Factura',
                        'name'=>'numeroFactura',
                        
                        'value'=>'$data->numeroFactura',
                		'type'=>'raw',
                ),
		
                
		array(
                        'header'=>'Condicion',
                        'name'=>'condicion',
                        'filter'=>FacturasEntrantes::getCondicion(),
                        'value'=>'$data->condicion',
                		'type'=>'raw',
                ),
		array(
                  'name'=>'precio',
                    'type'=>'html',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->importe,"$")',
                ),
		
                array(
                        'header'=>'Estado',
                        'name'=>'estado',
                        'filter'=>FacturasEntrantes::getEstados(),
                        'value'=>'$data->estado',
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
			'class'=>'CButtonColumn','template' => '{asignarPrecio} {pagar} {items}{update}  {vencimientos}{delete}',
			'buttons' => array(
                            'update' => array(
                    			'label'=>'Actualizar',
                    			'url'=>'$data->condicion=="Stock"?(Yii::app()->createUrl("facturasEntrantes/updateStock",
                    			array("id"=>$data->idFacturaEntrante))):(Yii::app()->createUrl("facturasEntrantes/updateConcepto",
                    			array("id"=>$data->idFacturaEntrante)))'   ,
                    			
                    
                            ),
                            'asignarPrecio' => array(
                    			'label'=>'Asignar Precios Automaticos',
                    			'url'=>'Yii::app()->createUrl("stockPrecios/asignarCompra",
                    			array("id"=>$data->idFacturaEntrante))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/money_add.png',
                                'visible'=>'$data->condicion=="Stock"'
                    
                            ),
                            'items' => array(
                    			'label'=>'Items',
                    			'url'=>'Yii::app()->createUrl("facturasEntrantes/verItems",
                    			array("idFactura"=>$data->idFacturaEntrante))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/basket.png',
                    
                            ),
                            'vencimientos' => array(
                    			'label'=>'Vencimientos',
                    			'url'=>'Yii::app()->createUrl("facturasEntrantesVencimientos/",
                    			array("idFacturaEntrante"=>$data->idFacturaEntrante))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/calendar_link.png',
                    
                            ),
			'pagar' => array(
                    			'label'=>'Pagar (pago directo)',
                    			'url'=>'Yii::app()->createUrl("ordenesPago/pagoDirecto",
                    			array("idFactura"=>$data->idFacturaEntrante,"idProveedor"=>$data->idProveedor))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/money.png',
                            'visible'=>'$data->estado!="CANC"'
                    
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
