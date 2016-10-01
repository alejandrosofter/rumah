<?php
$this->breadcrumbs=array(
	'Balances'=>array('/balances')
);

$this->menu=array(

);
?>

<h1>FACTURAS CONTABLE</h1>

<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>false,'id'=>'Reporte-form',
'action'=>Yii::app()->createUrl('balances/facturacionContable'),
	'method'=>'post',
)); ?>
<div class="form">
<p class="note">Por favor ingrese el rango de fechas a consultar:</p>
<div class="row">
<?php echo $form->labelEx($model,'fechaInicio'); ?>
<?php $this->widget( 'ext.EJuiTimePicker.EJuiTimePicker', array(
  'model' => $model, // Your model
  'attribute' => 'fechaInicio',
    'options' => array(
          'dateFormat' => 'yy-mm-dd')
)); ?>

<div class="row">
<?php echo $form->labelEx($model,'fechaFin'); ?>
<?php $this->widget( 'ext.EJuiTimePicker.EJuiTimePicker', array(
  'model' => $model, // Your model
  'attribute' => 'fechaFin',
    'options' => array(
          'dateFormat' => 'yy-mm-dd')
)); ?>
</div>
<div class="actions">
<?php echo CHtml::submitButton('Reporte',array('class'=>'btn primary')); ?>
</div>
</div></div>
<?php $this->endWidget(); ?> 	