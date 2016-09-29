<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idHora'); ?>
		<?php echo $form->textField($model,'idHora'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idEmpleado'); ?>
		<?php echo $form->textField($model,'idEmpleado',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'justificado'); ?>
		<?php echo $form->textField($model,'justificado',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estadoHora'); ?>
		<?php echo $form->textField($model,'estadoHora',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaHoraTrabajo'); ?>
		<?php echo $form->textField($model,'fechaHoraTrabajo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entradaSalida'); ?>
		<?php echo $form->textField($model,'entradaSalida',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comentarioHora'); ?>
		<?php echo $form->textField($model,'comentarioHora',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->