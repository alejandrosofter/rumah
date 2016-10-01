<?php
$this->breadcrumbs=array(
	'Pagos'
);

$this->menu=array(
	array('label'=>'Listar Pagos'),
	array('label'=>'Nuevo Pago', 'url'=>array('create')),
	
	array('label'=>'Listar Asignaciones de Factura', 'url'=>array('/gastosFactura')),
	array('label'=>'Ver Cuentas', 'url'=>array('/cuentasEfectivo')),
	
);
?>

<h1>PAGOS</h1>
Listado de pagos tanto de facturas como de pagos individuales:
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gastos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	
                
                array(
                        'header'=>'Proveedor',
                        'name'=>'proveedores.nombre',
                        'filter'=>CHtml::textField('nombre',(isset($_GET['nombre']) ? $_GET['nombre'] : "")),
                        'value'=>'$data->proveedores->nombre',
                		'type'=>'raw',
                ),
		array(
                  'name'=>'fecha',
                    'type'=>'html',
                    'value'=>'Yii::app()->dateFormatter->format("dd-M-y",$data->fecha);',
                ),
		'formaPago',
		  array(
                  'name'=>'asociaciones',
                    'type'=>'html',
                    'value'=>'($data->asociaciones==0)?"Sin Factura":CHtml::link("Ver Factura (".$data->asociaciones.")",Yii::app()->createUrl("facturasEntrantes/update",array("id"=>$data->idFacturaEntrante)))',
                ),
		array(
                  'name'=>'importe',
                    'type'=>'html',
                    'value'=>'Yii::app()->numberFormatter->formatCurrency($data->importe,"$")',
                ),
       
		
		/*
		'idCuentaEfectivo',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
