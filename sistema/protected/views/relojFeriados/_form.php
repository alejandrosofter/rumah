<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reloj-feriados-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaFeriado'); ?>
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaFeriado'))?>
		
		<?php echo $form->error($model,'fechaFeriado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comentarioFeriado'); ?>
		<?php echo $form->textField($model,'comentarioFeriado',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'comentarioFeriado'); ?>
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->