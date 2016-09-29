<?php
$this->breadcrumbs=array(
	'Balances'=>array('/balances')
);

$this->menu=array(

);
?>

<h1>Listado de Clientes</h1>

<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>false,'id'=>'Reporte-form',
'action'=>Yii::app()->createUrl('balances/informeVentas'),
	'method'=>'post',
)); ?>
<div class="form">
<p class="note">Por favor ingrese el rango de fechas a consultar:</p>
<div class="row">
<?php echo $form->labelEx($model,'fechaInicio'); ?>
<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaInicio'))?>

<div class="row">
<?php echo $form->labelEx($model,'fechaFin'); ?>
<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaFin'))?>
</div>
<div class="actions">
<?php echo CHtml::submitButton('Reporte',array('class'=>'btn primary')); ?>
</div>

<?php $this->endWidget(); ?> 	