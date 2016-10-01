<?php
$this->breadcrumbs=array(
	'Ctas Corrientes',
);

$this->menu=array(
//	array('label'=>'Nuevo Cliente', 'url'=>array('create')),
);
?>

<h1>CTAS CORRIENTES</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'clientes-grid',
    'ajaxUpdate'=>false,
	'dataProvider'=>$model->consultarSaldo(),
	'filter'=>$model,
	'columns'=>array(
				array(
                        'header'=>'Cliente',
                        'name'=>'cliente',
                        'filter'=>CHtml::textField('nombre',(isset($_GET['nombre']) ? $_GET['nombre'] : "")),
                        'value'=>'$data->cliente',
                		'type'=>'raw',
                ),     
                
        'cuit',
		'direccion',
		'comunicacion',
            array(
                  'name'=>'aCuenta',
                    'type'=>'html',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->aCuenta,"$")',
                ),
            array(
                  'name'=>'saldo',
                    'type'=>'html',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->saldo-$data->pago,"$")',
                ),
//        'email',

		array(
			'class'=>'CButtonColumn','template' => '{pago}{imprimir}{detalle}',
			'buttons' => array(
                            'imprimir' => array(
                    			'label'=>'Imprimir',
                    			'url'=>'Yii::app()->createUrl("impresiones/create",array("idCliente"=>$data->idCliente,"tipoImpresion"=>"saldoCliente","fechaInicio"=>"","fechaFin"=>""))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/printer.png',
                            
                    
                            ),
			 'pago' => array(
                    			'label'=>'Destinar importe A cuenta',
                    			'url'=>'Yii::app()->createUrl("ordenesCobro/aplicarCobrosCuenta",array("idCliente"=>$data->idCliente))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/money.png',
                             'visible'=>'$data->aCuenta>0'
                    
                            ),
                            'detalle' => array(
                    			'label'=>'Detalle',
                    			'url'=>'Yii::app()->createUrl("facturasSalientes&cliente=$data->idCliente&FacturasSalientes%5Bfecha%5D=&FacturasSalientes%5BnumeroFactura%5D=&FacturasSalientes%5BtipoFactura%5D=&FacturasSalientes%5Bestado%5D=PEND&FacturasSalientes%5BimporteFactura%5D=&FacturasSalientes_page=1")'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/script.png',
                    
                            ),
                          
                            ),
		),
	),
)); ?>

