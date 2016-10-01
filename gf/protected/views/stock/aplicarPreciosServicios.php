<?php
$this->breadcrumbs=array(
	'Centro de Stock'=>array('/stock/centroStock'),'Tipo Productos'=>array('/stockTipoProducto'),
	'Listado de Categorias'
);

$this->menu=array(

	
);
?>

<h1>Aplicar Precios Generales de Servicios</h1>

<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>false,'id'=>'Reporte-form',
'action'=>Yii::app()->createUrl('stock/aplicarPreciosServicios'),
	'method'=>'post',
)); ?>
<div class="form">
<div class="row">
		<?php echo $form->labelEx($model,'formulaPrecios'); ?>
		<?php echo $form->textField($model,'formulaPrecios',array('size'=>80)); ?>
		<?php echo $form->error($model,'formulaPrecios'); ?>
	</div>

<b>INFORMACION FORMULA</b> <br>
<b>%USP =</b> ultimo precio Existente en sistema del SERVICIO<br>
<b>%PIVA =</b> porcentaje de iva del SERVICIO<br>
<br>
Ej: Servicio: Servicio de limpieza <br>
<b>FORMULA %USP * %PIVA </b> <br>
Porcentaje Iva: 21.00 <br>
ultimo precio existente : $45 <br>
Esto daria un precio de venta de 45 * 1.21= $54.45 <br><br>


Esta seguro de realizar la operacion? .. Se modificaran los precios por los existentes...
<div class="row buttons">
<?php echo CHtml::submitButton('Aceptar y aplicar '); ?>
</div>
</div>
<?php $this->endWidget(); ?> 	