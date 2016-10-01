<?php
$this->breadcrumbs=array(
	'Ordenes de Cobro',
);

$this->menu=array(
	array('label'=>'Crear Orden de Cobro', 'url'=>array('crearCobro')),

);
?>

<h1>Ordenes de Cobro</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'items-factura-saliente-grid',
	'dataProvider'=>$model->search(),
    'ajaxUpdate'=>false,
	'filter'=>$model,
	'columns'=>array(
		array(
                  'name'=>'cliente',
                    'type'=>'html',
                    'value'=>'CHtml::link($data->cliente,
                    Yii::app()->createUrl("clientes/view",array("id"=>$data->idCliente)))',
                    'filter'=>CHtml::textField('cliente',(isset($_GET['cliente']) ? $_GET['cliente'] : "")),
                ),	
array(
                  'name'=>'fechaOrdenCobro',
                    'type'=>'html',
                    'value'=>'Yii::app()->dateFormatter->format("dd-M-y",$data->fechaOrdenCobro);',
                    'filter'=>'',
                ),
		
//		'parcial',
array(
                  'name'=>'parcial',
                    'type'=>'html',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->parcial+$data->importeAcuenta,"$")',
                ),
array(
                  'name'=>'formaPago',
                    'type'=>'html',
                    'value'=>'$data->formaPago==""?"A cuenta (Cta cte)":$data->formaPago',
                ),
               
		/*
		'masIva',
		*/
		array(
			'class'=>'CButtonColumn','template' => '{items} {delete}',
			'buttons' => array(
                            'items' => array(
                    			'label'=>'Imputaciones',
                    			'url'=>'Yii::app()->createUrl("ordenesCobroFacturas/index",
                    			array("id"=>$data->idOrdenCobro))'   ,
                    			'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/famfam/script.png',
                    
                            ),
                            ),
		),
	),
)); ?>