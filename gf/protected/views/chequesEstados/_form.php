<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cheques-estados-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	
		<?php echo $form->textField($model,'idCheque',array('TYPE'=>'hidden')); ?>
		

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
    	'name'=>'ChequesEstados[fecha]',
    	'value'=>$model->fecha,
    	'options'=>array(
        'showAnim'=>'fold',
        'dateFormat' => 'yy-mm-dd',),
    	'htmlOptions'=>array(
        'style'=>'height:20px;'),)); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombreEstado'); ?>
		<?php echo  $form->dropDownList($model,'nombreEstado',$model->getEstados(),array ('prompt'=>'Seleccione el Estado ...'));?>
		<?php echo $form->error($model,'nombreEstado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->