<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'componentes-items-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

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
    "$('#ComponentesItems_idStock').val(ui.item.id);".
   "
    return false;
  }",
),
'htmlOptions'=>array('rows'=>50,'size'=>100),

));
?>
<?php echo $form->textField($model,'idStock',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
		<?php echo $form->error($model,'idStock'); ?>
	</div>


	<?php echo $form->textField($model,'idComponente',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad'); ?>
		<?php echo $form->error($model,'cantidad'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->