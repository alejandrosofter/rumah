<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'stock-precios-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaStock'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name'=>'StockPrecios[fechaStock]',
    'value'=>$model->fechaStock,
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
        'dateFormat' => 'yy-mm-dd',
    ),
    'htmlOptions'=>array(
    	
        'style'=>'height:20px;'
    ),
)); ?>
		<?php echo $form->error($model,'fechaStock'); ?>
	</div>

		<?php echo $form->textField($model,'enServicios',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden','VALUE'=>'1')); ?>

			<?php echo  $form->textField($model,'tipo',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden','VALUE'=>'servicio'));?>


	<div class="row">
		<?php echo $form->labelEx($model,'idTipo'); ?>
        	<?php echo  $form->dropDownList($model,'idTipo',CHtml::listData(Cuentas::model()->findAll(), 'idCuenta', 'nombre'),array ('prompt'=>'Seleccione la cuenta...'));?>
		<?php echo $form->error($model,'idTipo'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'porcentajeVariacion'); ?>
			<?php echo $form->textField($model,'porcentajeVariacion'); ?>
		<?php echo $form->error($model,'porcentajeVariacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->