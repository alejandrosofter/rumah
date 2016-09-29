<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'facturas-salientes-vencimiento-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>


		<?php echo $form->textField($model,'idFacturaSaliente',array('TYPE'=>'hidden')); ?>
<div class="row">
		<?php echo $form->labelEx($model,'fechaVencimiento'); ?>
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaVencimiento'))?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo 'PEND o CANC' ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Importe'); ?>
		<?php echo $form->textField($model,'importeFacturaSaliente'); ?>
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->