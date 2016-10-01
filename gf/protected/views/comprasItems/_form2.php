<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl('comprasItems/create&idFactura='.$model->idFacturaEntrante),
	'method'=>'post',
	'focus'=>array($model,'cantidad'),
	
)); ?>


		<?php echo  $form->textField($model,'idFacturaEntrante',array("TYPE"=>"hidden"));?>
		<?php echo $form->textField($model,'idStock',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
	<table>
	<td>
		<div class="row">
		<?php echo $form->labelEx($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad',array('class'=>'span1')); ?>

		</div>
	</td>
	<td>
	<div class="row">
		<?php echo $form->labelEx($model,'idStock'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'id'=>'buscador',
    'name'=>'buscador',
    'sourceUrl'=>$this->createUrl('stock/etiquetas',array('real'=>'')),
    'options'=>array('width'=>250,
    'showAnim'=>'fold',

  'select'=>"js:function(event, ui) {
".
    "$('#buscador').val(ui.item.valor);".
    "$('#ComprasItems_idStock').val(ui.item.id);".
     "$('#ComprasItems_alicuotaIva').val(ui.item.porcentajeIva);".
   "
    return false;
  }",
),
'htmlOptions'=>array('class'=>'span3','size'=>35),

));
?>
</div>
</td>
<td>

		<?php echo $form->labelEx($model,'alicuotaIva'); ?>
		<?php echo $form->textField($model,'alicuotaIva',array('class'=>'span2')); ?>
	

	</td>
	<td>

		<?php echo $form->labelEx($model,'importeCompra'); ?>
		<?php echo $form->textField($model,'importeCompra',array('class'=>'span3')); ?>
	

	</td>
<td>

		<?php echo CHtml::submitButton('Agregar'); ?>

	</td>
</table>
<?php $this->endWidget(); ?>

</div><!-- form -->