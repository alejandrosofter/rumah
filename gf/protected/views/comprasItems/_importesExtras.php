<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'facturas-entrantes-form',
	'enableAjaxValidation'=>false,
	'action'=>Yii::app()->createUrl('facturasEntrantes/update&id='.$model->idFacturaEntrante),
	'method'=>'post',

 
)); ?>
<table>
<td>
<div class="row" >
		<?php echo $form->labelEx($model,'importeDescuentos'); ?><br>
		<?php echo $form->textField($model,'importeDescuentos',array('class'=>'span2','maxlength'=>30)); ?>

	</div>
	<div class="row" >
		<?php echo $form->labelEx($model,'importeFlete'); ?><br>
		<?php echo $form->textField($model,'importeFlete',array('class'=>'span2','maxlength'=>30)); ?>
	
	</div>
</td>
<td>
	<div class="row" >
		<?php echo $form->labelEx($model,'importeRecargos'); ?><br>
		<?php echo $form->textField($model,'importeRecargos',array('class'=>'span2','maxlength'=>30)); ?>
	
	</div>
	<div class="row" >
		<?php echo $form->labelEx($model,'importeImpuestos'); ?><br>
		<?php echo $form->textField($model,'importeImpuestos',array('class'=>'span2','maxlength'=>30)); ?>
		
	</div>

</td>
</table>
	<?php echo CHtml::submitButton('Aplicar',array('class'=>'btn primary')); ?>
<?php $this->endWidget(); ?>
