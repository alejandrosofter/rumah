<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'empresas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombreEmpresa'); ?>
		<?php echo $form->textField($model,'nombreEmpresa',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombreEmpresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'esDefault'); ?>
		<i> 1(uno) en caso afirmativo o 0 (cero) en caso negativo </i> <br>
		<?php echo $form->textField($model,'esDefault'); ?>
		<?php echo $form->error($model,'esDefault'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->