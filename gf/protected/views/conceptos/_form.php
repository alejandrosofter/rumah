<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'conceptos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	

	<div class="row">
		<?php echo $form->labelEx($model,'nombreConcepto'); ?>
		<?php echo $form->textArea($model,'nombreConcepto',array('rows'=>6, 'cols'=>50)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idCuentaContable'); ?>
		<?php echo  $form->dropDownList($model,'idCuentaContable',CHtml::listData(Cuentas::model()->findAll(), 'idCuenta', 'nombre'),array ('prompt'=>'Seleccione la cuenta...'));?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigoConcepto'); ?>
		<?php echo $form->textField($model,'codigoConcepto',array('size'=>50,'maxlength'=>50)); ?>
		
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->