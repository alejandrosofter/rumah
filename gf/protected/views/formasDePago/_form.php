<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'formas-de-pago-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombreForma'); ?>
		<?php echo $form->textField($model,'nombreForma',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombreForma'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipoForma'); ?>
		<?php echo  $form->dropDownList($model,'tipoForma',$model->getTipos());?>
		<?php echo $form->error($model,'tipoForma'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidadCuotas'); ?>
		<?php echo $form->textField($model,'cantidadCuotas',array('class'=>'span1')); ?>
		<?php echo $form->error($model,'cantidadCuotas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'intereses'); ?>
		<?php echo $form->textField($model,'intereses',array('class'=>'span1')); ?>
		<?php echo $form->error($model,'intereses'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ingresoEgreso'); ?>
		<?php echo  $form->dropDownList($model,'ingresoEgreso',$model->getIngresoEgreso());?>
		<?php echo $form->error($model,'ingresoEgreso'); ?>
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->