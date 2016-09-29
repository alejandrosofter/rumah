<?php
$this->breadcrumbs=array(
	'Centro de Stock'=>array('/stock/centroStock'),'Inventarios'=>array('/inventarios'),
	'Listado de Inventarios'
);

$this->menu=array(
array('label'=>'Listado de Inventarios'),
	array('label'=>'Nuevo Inventario', 'url'=>array('create')),
	
);
?>

<h1>Aplicar Inventario</h1>

<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>false,'id'=>'Reporte-form',
'action'=>Yii::app()->createUrl('stock/aplicarStockInventario'),
	'method'=>'post',
)); ?>
<div class="form">
<?php echo $form->textField($model,'idInventario',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
    Sumar a disponibilidades actuales
<?php echo CHtml::checkBox('sumarDisponibilidades');?>
    <br/>
    Aplicar precio mas IVA
    <?php echo CHtml::checkBox('aplicarPreciosMasIva');?>
    <br/>
     <br/>
Esta seguro de realizar la operacion? .. Se modificaran las disponibilidades por los existentes, los no existentes se setearan en cero (0)
<div class="actions">
       <br/>
<?php echo CHtml::submitButton('Aceptar y aplicar ',array('class'=>'btn primary')); ?>
</div>
</div>
<?php $this->endWidget(); ?> 	