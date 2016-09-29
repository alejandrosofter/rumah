<?php
$this->breadcrumbs=array(
	'Centro de Ventas'=>array('centroVentas'),'Facturas de Venta',
);

$this->menu=array(
        array('label'=>"Pendientes(".($model->search(0,'PEND')->getTotalItemCount()).")", 'url'=>array('index&estado=PEND')),
	array('label'=>"Canceladas(".($model->search(0,'CANC')->getTotalItemCount()).")", 'url'=>array('index&estado=CANC')),
    array('label'=>"Anuladas(".($model->search(0,'ANULADA')->getTotalItemCount()).")", 'url'=>array('index&estado=ANULADA')),
	array('label'=>"Todas(".($model->search()->getTotalItemCount()).")", 'url'=>array('index')),
	//array('label'=>'Libro IVA Ventas', 'url'=>array('/facturasSalientes/consultarLibroIva&tipoLibro=A&mes=5&ano=2011')),
	array('label'=>'Nueva Factura', 'url'=>array('crearFactura')),
);
?>

<h1>FACTURAS</h1>

<?php  
$this->widget('ext.bootstrap.widgets.BootAlert',array(
    'id'=>'alert',
    'keys'=>array('success','info','warning','error'),
)); 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'facturas-salientes-grid',
    'ajaxUpdate'=>false,
	'dataProvider'=>$model->search(0,  isset ($_GET['estado'])?$_GET['estado']:''),
	'filter'=>$model,
	'columns'=>array(

		array(
                  'name'=>'cliente',
                    'type'=>'html',
                    'value'=>'CHtml::link($data->cliente,
                    Yii::app()->createUrl("clientes/view",array("id"=>$data->idCliente))).
                    ($data->esElectronica?CHtml::link(CHtml::image("images/iconos/famfam/email.png"),"index.php?r=facturasSalientes/enviarFacturaElectronica&id=$data->idFacturaSaliente"):"")',
                    'filter'=>CHtml::textField('cliente',(isset($_GET['cliente']) ? $_GET['cliente'] : "")),
                ),
		'fecha',
		'numeroFactura',
		array(
                  'name'=>'tipoFactura',
                    'type'=>'html',
                    'filter'=>FacturasSalientes::model()->getTipos(),
                    'value'=>'$data->tipoFactura',
                ),
		array(
                  'name'=>'estado',
                    'type'=>'html',
                    'filter'=>FacturasSalientes::model()->getEstados(),
                    'value'=>'$data->estado',
                ),
	
        array(
                  'name'=>'importeFactura',
                    'type'=>'html',
                    'value'=>'"<b>$ ". number_format ($data->importeFactura, '.Settings::model()->getValorSistema('DECIMALES_FACTURAS').', ",", ".")."</b>"',
                ),
		array(
			'class'=>'CButtonColumn','template' => '{pagar} {checkElectronica} {imprimir} {vencimientos} {delete}',
			'buttons' => array(
			 'imprimir' => array(
                               
                    			'label'=>'Imprimir',     
                    			'url'=>'Yii::app()->createUrl("/impresiones/imprimirAlgo",array("id"=>$data->idFacturaSaliente,"tipo"=>"factura".$data->tipoFactura))'   ,    // the PHP expression for generating the URL of the button
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
                             'vencimientos' => array(
                    			'label'=>'Vencimientos',
                    			'url'=>'Yii::app()->createUrl("facturasSalientesVencimiento/",array("idFacturaSaliente"=>$data->idFacturaSaliente))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/calendar_link.png',
                    
                            ),
                            'items' => array(
                    			'label'=>'Items',
                    			'url'=>'Yii::app()->createUrl("itemsFacturaSaliente/",array("idFacturaSaliente"=>$data->idFacturaSaliente))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/basket_put.png',
                    
                            ),
                            'checkElectronica' => array(
                    			'label'=>'Ingresar Factura Electronica a AFIP (no se ha podido ingresar)',
                    			'url'=>'Yii::app()->createUrl("facturasSalientes/ingresarElectronica",array("idFacturaSaliente"=>$data->idFacturaSaliente))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/error.png',
                                'visible'=>'$data->esElectronica && ($data->estadoElectronica=="FALLO" ||$data->estadoElectronica=="")'
                    
                            ),
                            'pagar' => array(
                    			'label'=>'Pagar(Pago directo)',
                    			'url'=>'Yii::app()->createUrl("ordenesCobro/pagoDirecto",array("idFactura"=>$data->idFacturaSaliente,"idCliente"=>$data->idCliente))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/money.png',
                                 'visible'=>'$data->estado!="CANC"'
                    
                            ),
                            ),
		),
	),
)); 

?>
<div id="id_view"></div>