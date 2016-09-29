<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl('facturasEntrantesConcepto/create&idFactura='.$model->idFacturaEntrante),
	'method'=>'post',
	'focus'=>'#buscador',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>


		<?php echo $form->textField($model,'idFacturaEntrante',array('TYPE'=>'hidden')); ?>
		<?php echo $form->textField($model,'idConcepto',array('TYPE'=>'hidden')); ?>

<table>
<td>
	<div class="row">
		<?php echo $form->labelEx($model,'idConcepto'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'id'=>'buscador',
    'name'=>'buscador',
    'sourceUrl'=>$this->createUrl('conceptos/etiquetas',array()),
    'options'=>array('width'=>250,
    'showAnim'=>'fold',

  'select'=>"js:function(event, ui) {
     $('#FacturasEntrantesConcepto_idConcepto').val(ui.item.idConcepto);" .
     		"
    return false;
  }",
),
'htmlOptions'=>array('rows'=>50,'size'=>35,"placeholder"=>"Escriba el Concepto Asociado"),

));
?>
		
	</div>
	</td>
	<td>
	<div class="row">
		<?php echo $form->labelEx($model,'alicuotaIva'); ?>
		<?php echo $form->textField($model,'alicuotaIva',array("placeholder"=>" 21% o 10.5")); ?>
		<?php echo $form->error($model,'alicuotaIva'); ?>
	</div>
	</td>
	<td>
	<div class="row">
		<?php echo $form->labelEx($model,'importe'); ?>
		<?php echo $form->textField($model,'importe',array("placeholder"=>" 0.00")); ?>
		<?php echo $form->error($model,'importe'); ?>
	</div>
	</td>
<td>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Agregar'); ?>
	</div>
</td>
</table>
<?php $this->endWidget(); ?>

</div><!-- form -->