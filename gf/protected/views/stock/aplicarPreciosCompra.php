<?php
$this->breadcrumbs=array(
	'Centro de Stock'=>array('/stock/centroStock'),'Tipo Productos'=>array('/stockTipoProducto'),
	'Listado de Categorias'
);

$this->menu=array(

	
);
?>

<h1>Aplicar Precios Por Compra</h1>

<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>false,'id'=>'Reporte-form',
//'action'=>Yii::app()->createUrl('stock/aplicarPreciosCompra'),
//	'method'=>'post',
)); ?>
<div class="form">
<div class="row">
    <b>Criterio</b>
		<?php echo  CHtml::dropDownList('criterio1','',Stock::model()->getFormasPrecio());?>
    <b>%</b>
		<?php echo  CHtml::textField('porcentaje1','0',array('class'=>'span1'));?>
    <i>Porcentaje que aplicara sobre el criterio</i>
    <br/> 
    <b>Redondear Importes</b>
    <?php echo  CHtml::checkbox('redondear');?>
	
	</div>
    <br/><br/><br/>


<i>Esta seguro de realizar la operacion? .. Se modificaran los precios por los existentes, en caso de que NO EXISTA precio de compra quedara el existente.</i>
<div class="actions">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
</div>
</div>
<?php $this->endWidget(); ?> 	