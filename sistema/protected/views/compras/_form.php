<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'compras-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaCompra'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name'=>'Compras[fechaCompra]',
    'value'=>$model->fechaCompra,
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
        'dateFormat' => 'yy-mm-dd',
    ),
    'htmlOptions'=>array(
    	
        'style'=>'height:20px;'
    ),
)); ?>
		<?php echo $form->error($model,'fechaCompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idFacturaEntrante'); ?>
		<?php echo  $form->dropDownList($model,'idFacturaEntrante',CHtml::listData(FacturasEntrantes::model()->findAll(), 'idFacturaEntrante', 'precio'),array ('prompt'=>'Seleccione la Factura de Compra...'));?>
		<?php echo $form->error($model,'idFacturaEntrante'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcionCompra'); ?>
		<?php echo $form->textArea($model,'descripcionCompra',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcionCompra'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->