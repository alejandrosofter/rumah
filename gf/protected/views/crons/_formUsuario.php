<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'crons-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <div class="row">
		<b>TAREA </b>
                <?php $datosTarea=Tareas::model()->consultarTodas(); ?>
		<?php echo  CHtml::dropDownList('tarea','',CHtml::listData($datosTarea, 'idTarea', 'descripcionTarea'));?>
		
	</div>
        <div class="row">
            <b>USUARIO </b>
		<?php echo  CHtml::dropDownList('usuarioTarea','',CHtml::listData(Usuarios::model()->findAll(), 'idUsuario', 'nombre'));?>
		
	</div>
        <div class="row">
		<b>SUPERVISOR </b>
		<?php echo  CHtml::dropDownList('supervisor','',CHtml::listData(Usuarios::model()->findAll(), 'idUsuario', 'nombre'));?>
		
	</div>
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
		<?php echo $form->textField($model,'dias',array('class'=>'span1','maxlength'=>255)); ?>
		<?php echo $form->error($model,'dias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'meses'); ?>
		<?php echo  $form->dropDownList($model,'meses',Settings::model()->getMeses());?>
		<?php echo $form->error($model,'meses'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'diasSemana'); ?>
		<?php echo  $form->dropDownList($model,'diasSemana',Settings::model()->getDiasSemana());?>
		<?php echo $form->error($model,'diasSemana'); ?>
	</div>


		<?php echo $form->textField($model,'script',array('TYPE'=>'hidden')); ?>

	
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