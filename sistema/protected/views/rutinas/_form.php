<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rutinas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'semana'); ?>
<!--		<?php echo $form->textField($model,'semana'); ?>-->

	
		<?php echo  $form->dropDownList($model,'semana',$model->getSemana(),array ('prompt'=>'Seleccione Semana...'));?>
		<?php echo $form->error($model,'semana'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombreDia'); ?>
		<?php echo $form->textField($model,'nombreDia',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nombreDia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idDia'); ?>
<!--		<?php echo $form->textField($model,'idDia'); ?>-->
		<?php echo  $form->dropDownList($model,'idDia',$model->getIdDia(),array ('prompt'=>'Seleccione Dia...'));?>
		<?php echo $form->error($model,'idDia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hora'); ?>
<!--		<?php echo $form->textField($model,'hora'); ?>-->
		<?php $form->widget('CMaskedTextField',array(
        'model'=>$model,
        'attribute'=>'hora',
        'mask'=>'99:99',
		
                
      ));?>
		<?php echo $form->error($model,'hora'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'divisorSemana'); ?>
		<?php echo $form->textField($model,'divisorSemana'); ?>
		<?php echo $form->error($model,'divisorSemana'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'horaIngreso'); ?>
<!--		<?php echo $form->textField($model,'horaIngreso'); ?>-->
		<?php $form->widget('CMaskedTextField',array(
        'model'=>$model,
        'attribute'=>'horaIngreso',
        'mask'=>'99:99',
		
                
      ));?>
		<?php echo $form->error($model,'horaIngreso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'horaSalida'); ?>
<!--		<?php echo $form->textField($model,'horaSalida'); ?>-->
		<?php $form->widget('CMaskedTextField',array(
        'model'=>$model,
        'attribute'=>'horaSalida',
        'mask'=>'99:99',
		
                
      ));?>
		<?php echo $form->error($model,'horaSalida'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comentarioRutina'); ?>
		<?php echo $form->textField($model,'comentarioRutina',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'comentarioRutina'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->