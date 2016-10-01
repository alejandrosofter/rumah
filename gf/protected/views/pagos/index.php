<?php
$this->breadcrumbs=array(
	'Pagos',
);

$this->menu=array(
	array('label'=>'Nuevo Pago', 'url'=>array('create')),
	array('label'=>'Listar Pagos',),
	array('label'=>'Nueva Factura','url'=>array('/facturasEntrantes/create')),
);
?>

<h1>Pagos</h1>
Listado de pagos realizados
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pagos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	
                
                array(
                        'header'=>'Cliente',
                        'name'=>'cliente',
                        'filter'=>CHtml::textField('nombre',(isset($_GET['nombre']) ? $_GET['nombre'] : "")),
                        'value'=>'$data->cliente',
                		'type'=>'raw',
                ),
	
//		'fecha',
		array(
                  'name'=>'fecha',
                    'type'=>'html',
                    'value'=>'($data->fecha=="")?"-":Yii::app()->dateFormatter->format("dd-M-y",$data->fecha);',
                ),

		
		array(
                  'name'=>'importeDinero',
                    'type'=>'html',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->importeDinero,"$")',
                ),
                array(
                        'header'=>'Forma de Pago',
                        'name'=>'formaPago',
                        'filter'=>CHtml::textField('formaPago',(isset($_GET['formaPago']) ? $_GET['formaPago'] : "")),
                        'value'=>'$data->formaPago',
                		'type'=>'raw',
                ),
		
		/*
		'idCuentaEfectivo',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>