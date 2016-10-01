<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idEmpleado'); ?>
		<?php echo $form->textField($model,'idEmpleado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idLegajo'); ?>
		<?php echo $form->textField($model,'idLegajo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreEmpleado'); ?>
		<?php echo $form->textField($model,'nombreEmpleado',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idCuil'); ?>
		<?php echo $form->textField($model,'idCuil',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaNacimiento'); ?>
		<?php echo $form->textField($model,'FechaNacimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'domicilio'); ?>
		<?php echo $form->textField($model,'domicilio',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaIngreso'); ?>
		<?php echo $form->textField($model,'fechaIngreso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'regl'); ?>
		<?php echo $form->textField($model,'regl',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'notifEmergencia'); ?>
		<?php echo $form->textField($model,'notifEmergencia',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'suaf'); ?>
		<?php echo $form->textField($model,'suaf',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'afectacion'); ?>
		<?php echo $form->textField($model,'afectacion',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'presentacion'); ?>
		<?php echo $form->textField($model,'presentacion',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'obrasocial'); ?>
		<?php echo $form->textField($model,'obrasocial',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'altaFirmada'); ?>
		<?php echo $form->textField($model,'altaFirmada',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'preocup'); ?>
		<?php echo $form->textField($model,'preocup',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'copiaDNI'); ?>
		<?php echo $form->textField($model,'copiaDNI',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cuil'); ?>
		<?php echo $form->textField($model,'cuil',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idsucursal'); ?>
		<?php echo $form->textField($model,'idsucursal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dni'); ?>
		<?php echo $form->textField($model,'dni',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idCategoria'); ?>
		<?php echo $form->textField($model,'idCategoria'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->