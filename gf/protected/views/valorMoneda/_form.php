<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'valor-moneda-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idTipoMoneda'); ?>
		<?php echo  $form->dropDownList($model,'idTipoMoneda',CHtml::listData(ValorMonedaTipos::model()->findAll(), 'idValorMonedaTipo', 'nombreMoneda'),array ('prompt'=>'Seleccione el Tipo de Moneda...'));?>
		<?php echo $form->error($model,'idTipoMoneda'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name'=>'ValorMoneda[fecha]',
    'value'=>$model->fecha,
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
        'dateFormat' => 'yy-mm-dd',
    ),
    'htmlOptions'=>array(
    	
        'style'=>'height:20px;'
    ),
)); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valorCompra'); ?>
		<?php echo $form->textField($model,'valorCompra'); ?>
		<?php echo $form->error($model,'valorCompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valorVenta'); ?>
		<?php echo $form->textField($model,'valorVenta'); ?>
		<?php echo $form->error($model,'valorVenta'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->