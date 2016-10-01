<?php
$this->breadcrumbs=array(
	'Centro de Compras'=>array('/facturasEntrantes/centroCompras'),'Saldo Proveedor'
);

$this->menu=array(
	array('label'=>'Nueva Factura','url'=>array('/facturasEntrantes/create')),
	array('label'=>'Nuevo Pago','url'=>array('/gastos/create')),
	array('label'=>'Libro IVA Ventas', 'url'=>array('/impresiones/librosiva')),
);
?>
<h1>SALDO DE PROVEEDORES</h1>
Por favor seleccione el proveedor y el rango de fechas para sacar el saldo...
<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>false,'id'=>'Reporte-form',
'action'=>Yii::app()->createUrl('facturasEntrantes/saldoProveedores'),
	'method'=>'post',
)); ?>
<div class="form">
<p class="note">Por favor ingrese el rango de fechas a consultar:</p>

	
<div class="row">
<?php echo $form->labelEx($model,'fechaInicio'); ?>
<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
    'model'=>$model,
    'attribute'=>'fechaInicio',
'id'=>'fechaInicio',
    'options'=>array(
        'showAnim'=>'fold',
        'dateFormat' => "dd-mm-yy",
    ),
    'htmlOptions'=>array(
//         'value'=>$fechaInicio,
        'style'=>'height:20px;'
    ),
));


?>




</div>
<div class="row">
<?php echo $form->labelEx($model,'fechaFin'); ?>
<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
           'attribute'=>'fechaFin',
			'id'=>'fechaFin',
           'model'=>$model,
        'options'=>array(
        'showAnim'=>'fold',
        'dateFormat' => "dd-mm-yy",
    ),
    'htmlOptions'=>array(
//        'value'=>$fechaFin,
        'style'=>'height:20px;'
    ),
));?>
</div>
<div class="row buttons">
<?php echo CHtml::submitButton('Reporte'); ?>
</div>
</div>
<?php $this->endWidget(); ?> 	