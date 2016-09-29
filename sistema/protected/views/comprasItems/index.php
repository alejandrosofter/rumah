<?php

$this->breadcrumbs=array(
	'Centro de Compras'=>array('/facturasEntrantes/facturas'),'Facturas de Compra'
);

$this->menu=array(

	array('label'=>'Nueva Factura de Compra', 'url'=>array('facturasEntrantes/crearParaStock')),
        array('label'=>'Imprimir Codigos de Barra a productos propios', 'url'=>array('imprimirCbPropios&id='.$idFactura.'&propios=1')),
    array('label'=>'Imprimir Codigos de Barra existentes', 'url'=>array('imprimirCbPropios&id='.$idFactura.'&propios=0')),
    array('label'=>'Listar Facturas', 'url'=>array('/facturasEntrantes')),
	
	//array('label'=>'Dialogo', 'url'=>array('/stockPreciosItems/create'), 
	//'linkOptions'=>array('onclick'=>'$("#mydialog").dialog("open"); return false;')),
);
?>

<h1>Productos de la Compra</h1>
Detalle de los productos comprados.
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'compras-items-grid',
	'dataProvider'=>$model->consultarProductos($idFactura),
	'template'=>"{items}",
	'columns'=>array(
		'cantidad',
		array(
                  'name'=>'nombreStock',
                    'type'=>'html',
                    'value'=>'Chtml::link($data->nombreStock,Yii::app()->createUrl("/stock/update&id=$data->idStock"))',
                ),
            
		
		array(
                  'name'=>'alicuotaIva',
                    'type'=>'html',
                    'value'=>'Yii::app()->numberFormatter->formatPercentage($data->alicuotaIva)',
                ),
        array(
                  'name'=>'stockeado',
                    'type'=>'html',
                    'value'=>'($data->stockeado==0)?"si":"no"',
                ),
            array(
                  'name'=>'codigoBarrra',
                    'type'=>'html',
                 'type'=>'html',
                    'value'=>'($data->codigoBarra=="")?"<b>Sin codigo Barras</b>":$data->codigoBarra.(strpos($data->codigoBarra, Stock::model()->pais.Stock::model()->empresa)==false?"":"*")',
                ),
		array(
                  'name'=>'importeCompra',
                    'type'=>'html',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->importeCompra,"$")',
                ),
       
            array(
      'class'=>'ext.gridcolumns.CalcColumn',
      'name'=>'importeTotal',
            'value'=>'($data->importeTotal)',
            'header'=>'$ NETO',
            'tituloFooter'=>'Sub-Total',
      'output'=>'"<b> ".Yii::app()->numberFormatter->formatCurrency($data->importeTotal,"$")." </b>"',
      'type'=>'html',
      'footer'=>true,
           'footerOutput'=>'"<br>".Yii::app()->numberFormatter->formatCurrency($value,"$")'
     ),
            array(
      'class'=>'ext.gridcolumns.CalcColumn',
      'name'=>'importeTotal',
            'value'=>'($data->importeTotal*(($data->alicuotaIva/100)+1))',
            'header'=>'$ FINAL',
            'tituloFooter'=>'Total',
      'output'=>'"<b> ".Yii::app()->numberFormatter->formatCurrency($data->importeTotal*(($data->alicuotaIva/100)+1),"$")." </b>"',
      'type'=>'html',
      'footer'=>true,
           'footerOutput'=>'"<br>".Yii::app()->numberFormatter->formatCurrency($value,"$")'
     ),
             array(
      'class'=>'ext.gridcolumns.CalcColumn',
      'name'=>'precioLista',
            'value'=>'($data->precioLista*$data->cantidad)-$data->importeTotal*(($data->alicuotaIva/100)+1)',
            'header'=>'$ VENTA',
            'tituloFooter'=>'$ Gan.',
      'output'=>'"<b> ".Yii::app()->numberFormatter->formatCurrency($data->precioLista,"$")." </b>"',
      'type'=>'html',
      'footer'=>true,
           'footerOutput'=>'"<br>".Yii::app()->numberFormatter->formatCurrency($value,"$")'
     ),
		
		array(
			'class'=>'CButtonColumn','template' => ' {precio} {imprimir} {stockear} {destockear} ',
			'buttons' => array(
                           
                            'imprimir' => array(
                               
                    			'label'=>'Imprimir codigo de barras',     
                    			'url'=>'Yii::app()->createUrl("/stock/imprimirCodigo",array("id"=>$data->idStock))'   ,    // the PHP expression for generating the URL of the button
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/printer.png',  // image URL of the button. If not set or false, a text link is used
                    'options'=>array(  
    'ajax'=>array(
            'type'=>'POST',
                // ajax post will use 'url' specified above 
            'url'=>"js:$(this).attr('href')", 
            'update'=>'#id_view',
           ),
     ),
     ),
                   
			 'destockear' => array(
                    			'label'=> 'Quitar de Stock',
                    			'url'=>'Yii::app()->createUrl("comprasItems/quitarStock",array("idCompraItem"=>$data->idCompraItem, "idFactura"=>$data->idFacturaEntrante))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/lorry_delete.png',
                    
                            ),
                            'stockear' => array(
                    			'label'=>'Agregar a Stock',
                    			'url'=>'Yii::app()->createUrl("comprasItems/agregarStock",array("idCompraItem"=>$data->idCompraItem, "idFactura"=>$data->idFacturaEntrante))'  ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/lorry_add.png',
                    
                            ),
                            'precio' => array(
                               
                    			'label'=>'Asignar precio al producto',     
                    			'url'=>'Yii::app()->createUrl("stockPreciosItems/create",array("precioCompra"=>$data->importeCompra,"idStock"=>$data->idStock,"minimo"=>$data->precioMinimo / (($data->porcentajeIva/100)+1),"lista"=>$data->importeSinIva,"porcentajeIva"=>$data->porcentajeIva))'   ,
                    			
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/money_add.png',  // image URL of the button. If not set or false, a text link is used
                    'options'=>array(  
    'ajax'=>array(
            'type'=>'POST',
                // ajax post will use 'url' specified above 
            'url'=>"js:$(this).attr('href')", 
            'update'=>'#id_view1',
           ),
     ),
     ),
                            ),
		),
	),
)); ?>
<?php
$model=FacturasEntrantes::model()->findByPk($idFactura);
echo 'FLETE:'. Yii::app()->numberFormatter->formatCurrency($model->importeFlete,"$").'<br>';
echo 'DESCUENTOS:'.Yii::app()->numberFormatter->formatCurrency($model->importeDescuentos,"$").'<br>';
echo 'RECARGOS:'.Yii::app()->numberFormatter->formatCurrency($model->importeRecargos,"$").'<br>';
echo 'IMPUESTOS:'.Yii::app()->numberFormatter->formatCurrency($model->importeImpuestos,"$").'<br>';

?>
<div id="id_view"></div>
<div id="id_view1"></div>
