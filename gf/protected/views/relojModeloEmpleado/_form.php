<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reloj-modelo-empleado-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
	    <?php echo $form->labelEx($model,'idCategoria'); ?>
	    <?php echo $form->dropDownList($model,'idCategoria',CHtml::listData(RelojCategorias::model()->findAll(),
	     'idCateogria', 'nombreCategoria'),array ('prompt'=>'Seleccione...'));?>
		<?php echo $form->error($model,'idCategoria'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'diaInicio'); ?>
		<?php echo $form->textField($model,'diaInicio'); ?>
		<?php echo $form->error($model,'diaInicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'diaFin'); ?>
		<?php echo $form->textField($model,'diaFin'); ?>
		<?php echo $form->error($model,'diaFin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nroDiaInicio'); ?>
		<?php echo $form->textField($model,'nroDiaInicio'); ?>
		<?php echo $form->error($model,'nroDiaInicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nroDiaFin'); ?>
		<?php echo $form->textField($model,'nroDiaFin'); ?>
		<?php echo $form->error($model,'nroDiaFin'); ?>
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->