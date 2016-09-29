<?php
$this->breadcrumbs=array(
	'Centro de Stock'=>array('/stock/centroStock'),'Inventarios'=>array('/inventarios'),
	'Listado de Inventarios'
);

$this->menu=array(
array('label'=>'Listado de Inventarios'),
	array('label'=>'Nuevo Inventario', 'url'=>array('create')),
	array('label'=>'Setear Porcentaje Ganancia', 'url'=>array('/settings/update&id=17')),
	array('label'=>'Porcentajes Categoria Prod.', 'url'=>array('/stockTipoProducto')),
	
);
?>

<h1>Aplicar Precios Inventario</h1>

<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>false,'id'=>'Reporte-form',
'action'=>Yii::app()->createUrl('stock/aplicarPreciosInventario'),
	'method'=>'post',
)); ?>
<div class="form">
<div class="row">
		<?php echo $form->labelEx($model,'formulaInventarioPrecios'); ?>
		<?php echo $form->textField($model,'formulaInventarioPrecios',array('size'=>80)); ?>
		<?php echo $form->error($model,'formulaInventarioPrecios'); ?>
	</div>
<?php echo $form->textField($model,'idInventario',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
<b>INFORMACION FORMULA</b> <br>
<b>%UP =</b> ultimo precio de compra de CADA PRODUCTO<br>
<b>%PIVA =</b> porcentaje de iva de CADA PRODUCTO<br>
<b>%PG =</b> porcentaje de ganancia del tipo de producto asociado a CADA PRODUCTO<br>
<b>%PPG =</b> porcentaje de ganancia de la CATEGORIA de CADA PRODUCTO<br><br>
Ej: Producto: PILAS AAA x 6 <br>
<b>FORMULA %UP * %PIVA * %PG </b> <br>
Porcentaje Iva: 10.5 <br>
Importe ultima compra de pilas:  $40 <br>
Porcentaje asociado a la categoria PILAS : 20% <br>
Porcentaje de ganancia de venta : 10 % <br>
Esto daria un precio de venta de 40 * 1.105* 1.10 = $48.62 <br><br>


Esta seguro de realizar la operacion? .. Se modificaran los precios por los existentes, en caso de que NO EXISTA precio de compra quedara el existente.
<div class="row buttons">
<?php echo CHtml::submitButton('Aceptar y aplicar '); ?>
</div>
</div>
<?php $this->endWidget(); ?> 	