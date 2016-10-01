<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'crons-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
           
        <div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('class'=>'span8','maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'horas'); ?>
		<?php echo $form->textField($model,'horas',array('class'=>'span1', 'cols'=>50)); ?>
		<?php echo $form->error($model,'horas'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'minutos'); ?>
		<?php echo $form->textField($model,'minutos',array('class'=>'span1','maxlength'=>255)); ?>
		<?php echo $form->error($model,'minutos'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'dias'); ?>
		<?php echo $form->textField($model,'dias',array('class'=>'span2','maxlength'=>255)); ?>
		<?php echo $form->error($model,'dias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'meses'); ?>
		<?php echo  $form->dropDownList($model,'meses',Settings::model()->getMeses());?>
		<?php echo $form->error($model,'meses'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'diasSemana'); ?>
		<?php echo $form->textField($model,'diasSemana',array('class'=>'span3','maxlength'=>255)); ?>
		<?php echo $form->error($model,'diasSemana'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'script'); ?>
		<?php echo $form->textArea($model,'script',array('class'=>'span9')); ?>
		<?php echo $form->error($model,'script'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parametros'); ?>
		<?php echo $form->textField($model,'parametros',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'parametros'); ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

   Minutos		0-59	* / , - <br>
horas		0-23	* / , -<br>
Dia		1-31	* / , - ? L W<br>
Mes		1-12 or JAN-DEC	* / , -<br>
Dia/se		0-6 or SUN-SAT	* / , - ? L # (Domingo=0 ,Lunes=1 .. )<br>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->