
<div class="row">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ordenes-pago-vencimientos-form',
	'action'=>Yii::app()->createUrl('ordenesPagoVencimientos/create'),
	'method'=>'post',
	'focus'=>('#idFacturaEntrante_'),
	'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->textField($model,'idOrdenPago',array('TYPE'=>'hidden')); ?>
<?php echo $form->textField($model,'pagado',array('TYPE'=>'hidden')); ?>
<?php echo $form->textField($model,'idFacturaEntrante',array('TYPE'=>'hidden')); ?>

<?php echo $form->textField($model,'idFacturaEntranteVencimiento',array('TYPE'=>'hidden')); ?>


<div class="row">
  <div class="span4">
   <?php  echo $form->labelEx($model,'idFacturaEntrante'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(

    'name'=>'idFacturaEntrante_',
    'sourceUrl'=>$this->createUrl('facturasEntrantes/etiquetasPendientes&idProveedor='.$idProveedor),
    'options'=>array('width'=>250,
    'showAnim'=>'fold',

  'select'=>"js:function(event, ui) {
     $('#OrdenesPagoVencimientos_idFacturaEntrante').val(ui.item.idFacturaEntrante);" .
     "$( '#idFacturaEntranteVencimiento_' ).autocomplete( 'option', 'source', 'index.php?r=facturasEntrantesVencimientos/etiquetasPendientes&idFacturaEntrante='+ui.item.idFacturaEntrante);".
    "return false;
  }",
),
'htmlOptions'=>array('rows'=>5,'size'=>20),

));
?>
  </div>
  <div class="span4">
   <?php echo $form->labelEx($model,'idFacturaEntranteVencimiento'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(

    'name'=>'idFacturaEntranteVencimiento_',
    'sourceUrl'=>$this->createUrl('facturasEntrantesVencimientos/etiquetasPendientes&idFacturaEntrante='.$model->idFacturaEntrante),
    'options'=>array('width'=>200,
    'showAnim'=>'fold',

  'select'=>"js:function(event, ui) {
     $('#OrdenesPagoVencimientos_idFacturaEntranteVencimiento').val(ui.item.idFacturaVencimiento);" .
     "$('#OrdenesPagoVencimientos_importe').val(ui.item.paraPagar);".
     "$('#OrdenesPagoVencimientos_pagado').val(ui.item.pagado);".
    "return false;
  }",
),
'htmlOptions'=>array('rows'=>5,'size'=>15),

));
?>
  </div>
  
  <div class="span1">
   <?php echo $form->labelEx($model,'importe'); ?>
		<?php echo $form->textField($model,'importe',array('placeholder'=>'0.00')); ?>
  </div>
  
  <div class="span1">
 
    <?php echo $form->labelEx($model,' '); ?>
    
    <?php echo CHtml::submitButton('Agregar',array('class'=>'btn primary')); ?>
  </div>
  
</div>
<?php $this->endWidget(); ?>

</div>