<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idTurno'); ?>
		<?php echo $form->textField($model,'idTurno'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idTipoTurno'); ?>
		<?php echo $form->textField($model,'idTipoTurno',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ingresoInicio'); ?>
		<?php echo $form->textField($model,'ingresoInicio',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'salidaInicio'); ?>
		<?php echo $form->textField($model,'salidaInicio',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ingresoRegreso'); ?>
		<?php echo $form->textField($model,'ingresoRegreso',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'salidaRegreso'); ?>
		<?php echo $form->textField($model,'salidaRegreso',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'semana'); ?>
		<?php echo $form->textField($model,'semana',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'diaNombre'); ?>
		<?php echo $form->textField($model,'diaNombre',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'horas'); ?>
		<?php echo $form->textField($model,'horas',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'horas50'); ?>
		<?php echo $form->textField($model,'horas50',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'horas100'); ?>
		<?php echo $form->textField($model,'horas100',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'horas50Noct'); ?>
		<?php echo $form->textField($model,'horas50Noct',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'horas100Noct'); ?>
		<?php echo $form->textField($model,'horas100Noct',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idCategoria'); ?>
		<?php echo $form->textField($model,'idCategoria',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->