<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idHoraDiaEmpleado'); ?>
		<?php echo $form->textField($model,'idHoraDiaEmpleado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idEmpleado'); ?>
		<?php echo $form->textField($model,'idEmpleado',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaDia'); ?>
		<?php echo $form->textField($model,'fechaDia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estadoFecha'); ?>
		<?php echo $form->textField($model,'estadoFecha',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comentario'); ?>
		<?php echo $form->textField($model,'comentario',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entradaUno'); ?>
		<?php echo $form->textField($model,'entradaUno',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'salidaUno'); ?>
		<?php echo $form->textField($model,'salidaUno',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entradaDos'); ?>
		<?php echo $form->textField($model,'entradaDos',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'salidaDos'); ?>
		<?php echo $form->textField($model,'salidaDos',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entradaTres'); ?>
		<?php echo $form->textField($model,'entradaTres',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'salidaTres'); ?>
		<?php echo $form->textField($model,'salidaTres',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modificacion'); ?>
		<?php echo $form->textField($model,'modificacion',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->