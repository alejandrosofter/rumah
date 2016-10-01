<?php
$this->breadcrumbs=array(
	'Ordenes de Pago',
);

$this->menu=array(
	array('label'=>'Nueva Orden de Pago', 'url'=>array('crearOrden')),
	
);
?>

<h1>Ordenes de Pago</h1>
<i>Vea todos los pagos imputados a los PROVEEDORES con los importes A CUENTA (son los pagos que van a Cta.Cte) y IMPUTACIONES (que son los pagos sobre las facturas). </i>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ordenes-pago-grid',
    'ajaxUpdate'=>false,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idOrdenPago',
		array(
                  'name'=>'fechaOrden',
                    'type'=>'html',
                    'value'=>'Yii::app()->dateFormatter->format("dd-M-y",$data->fechaOrden);',
                    'filter'=>'',
                ),
		array(
                  'name'=>'proveedor',
                    'type'=>'html',
                   'value'=>'CHtml::link($data->proveedor,
                    Yii::app()->createUrl("proveedores/update",array("id"=>$data->idProveedor)))',
                    'filter'=>CHtml::textField('proveedor',(isset($_GET['proveedor']) ? $_GET['proveedor'] : "")),
                ),

		array(
                  'name'=>'formaPago',
                    'type'=>'html',
                    'value'=>'$data->formaPago',
                  
                ),
        array(
                  'name'=>'pagado',
                    'type'=>'html',
                   'value'=>'Yii::app()->numberFormatter->formatCurrency($data->pagado,"$")',
                 
                ),
		array(
			'class'=>'CButtonColumn','template' => '{items} {delete}',
			'buttons' => array(
                            'items' => array(
                    			'label'=>'Imputaciones',
                    			'url'=>'Yii::app()->createUrl("ordenesPagoVencimientos/index",
                    			array("id"=>$data->idOrdenPago))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/script.png',
                    
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