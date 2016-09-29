<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'acciones-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'direccion'); ?>
		<?php echo $form->textField($model,'direccion',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'direccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'subTipo'); ?>
		<?php echo $form->textField($model,'subTipo',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'subTipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'imagen'); ?>
		<?php echo $form->textField($model,'imagen',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'imagen'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'padre'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'model'=>$model,
    'attribute'=>'padre',
    'sourceUrl'=>$this->createUrl('acciones/etiquetas',array()),
    'options'=>array('width'=>250,
    'showAnim'=>'fold',

	
  'select'=>"js:function(event, ui) {
     $('#Acciones_padre').val(ui.item.idAccion);" .
     		"$('#buscador').val('');
    return false;
  }",
),
'htmlOptions'=>array('rows'=>50,'size'=>40,"placeholder"=>"Escriba el nombre del Proveedor"),

));
?>
</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->