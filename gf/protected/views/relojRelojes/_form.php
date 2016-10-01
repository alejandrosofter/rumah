<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reloj-relojes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'modelo'); ?>
		<?php echo $form->textField($model,'modelo',array('class'=>'span2','maxlength'=>255)); ?>
		<?php echo $form->error($model,'modelo'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'formato'); ?>
		<?php echo $form->textField($model,'formato',array('class'=>'span3','maxlength'=>255)); 
                echo '<br>ESTE FORMATO SOPORTA SOLAMENTE "YYYY" (año), "OO" (mes), "DD" (dia), "HH" (hora), "MM" (minuto), "SS" (segundo), "TTTT" (numero de tarjeta)'?>
		<?php echo $form->error($model,'formato'); ?>
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->