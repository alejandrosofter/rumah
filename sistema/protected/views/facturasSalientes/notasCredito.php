<?php
$this->breadcrumbs=array(
	'FActuras'=>array('/facturasSalientes'),'Notas de Credito',
);

$this->menu=array(
	
	array('label'=>'Nueva nota de Credito', 'url'=>array('/facturasSalientes/facturaCredito')),
);
?>

<h1>NOTAS DE CREDITO</h1>

<?php $this->widget('ext.bootstrap.widgets.BootAlert',array(
    'id'=>'alert',
    'keys'=>array('success','info','warning','error'),
)); 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'facturas-salientes-grid',
    'ajaxUpdate'=>false,
	'dataProvider'=>$model->search(1),
	'filter'=>$model,
	'columns'=>array(

		array(
                  'name'=>'cliente',
                    'type'=>'html',
                    'value'=>'CHtml::link($data->cliente,
                    Yii::app()->createUrl("clientes/view",array("id"=>$data->idCliente)))',
                    'filter'=>CHtml::textField('cliente',(isset($_GET['cliente']) ? $_GET['cliente'] : "")),
                ),
		'fecha',
             array(
                  'name'=>'tipoFactura',
                    'type'=>'html',
                 'header'=>'Tipo',
                    'value'=>'$data->tipoFactura',
                ),
		array(
                  'name'=>'numeroFactura',
                    'type'=>'html',
                    'value'=>'($data->numeroFactura)',
                    'header'=>'Nro'
                ),


	
        array(
                  'name'=>'importeFactura',
                    'type'=>'html',
                    'value'=>'"<b>".Yii::app()->numberFormatter->formatCurrency($data->importeFactura,"$")."</b>"',
                ),
             array(
                  'name'=>'estado',
                    'type'=>'html',
                    'value'=>'($data->estado=="PEND")?"OK":$data->estado',
                ),
		array(
			'class'=>'CButtonColumn','template' => ' {imprimir} {delete}',
			'buttons' => array(
			 'imprimir' => array(
                               
                    			'label'=>'Imprimir',     
                    			'url'=>'Yii::app()->createUrl("/impresiones/imprimirAlgo",array("id"=>$data->idFacturaSaliente,"tipo"=>"notaCredito"))'   ,    // the PHP expression for generating the URL of the button
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
                            'pagar' => array(
                    			'label'=>'Pagar(Pago directo)',
                    			'url'=>'Yii::app()->createUrl("ordenesCobro/pagoDirecto",array("idFactura"=>$data->idFacturaSaliente,"idCliente"=>$data->idCliente))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/money.png',
                                 'visible'=>'$data->estado!="CANC"'
                    
                            ),
                            ),
		),
	),
)); ?>
<div id="id_view"></div>