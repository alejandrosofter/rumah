<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reloj-sucursales-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombreSucursal'); ?>
		<?php echo $form->textField($model,'nombreSucursal',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombreSucursal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'direccionSucursal'); ?>
		<?php echo $form->textField($model,'direccionSucursal',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'direccionSucursal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefonoSucursal'); ?>
		<?php echo $form->textField($model,'telefonoSucursal',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'telefonoSucursal'); ?>
	</div>
	
	<div class="row">
	    <?php echo $form->labelEx($model,'idReloj'); ?>
	    <?php echo $form->dropDownList($model,'idReloj',CHtml::listData(RelojRelojes::model()->findAll(),
	     'id', 'modelo'),array ('prompt'=>'Seleccione...'));?>
		<?php echo $form->error($model,'idReloj'); ?>
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->