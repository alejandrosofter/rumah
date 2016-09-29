<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reloj-empleados-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idLegajo'); ?>
		<?php echo $form->textField($model,'idLegajo',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'idLegajo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombreEmpleado'); ?>
		<?php echo $form->textField($model,'nombreEmpleado',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombreEmpleado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idCuil'); ?>
		<?php $form->widget('CMaskedTextField',array(
        'model'=>$model,
        'attribute'=>'idCuil',
        'mask'=>'99 - 99999999 - 9',));?>
		<?php echo $form->error($model,'idCuil'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FechaNacimiento'); ?>
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'FechaNacimiento'))?>
		<?php echo $form->error($model,'FechaNacimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'domicilio'); ?>
		<?php echo $form->textField($model,'domicilio',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'domicilio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'telefono'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaIngreso'); ?>
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaIngreso'))?>
		<?php echo $form->error($model,'fechaIngreso'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'horasPactadas'); ?>
		<?php echo $form->textField($model,'horasPactadas',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'horasPactadas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'regl'); ?>
		<?php echo $form->textField($model,'regl',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'regl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'notifEmergencia'); ?>
		<?php echo $form->textField($model,'notifEmergencia',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'notifEmergencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'suaf'); ?>
		<?php echo $form->textField($model,'suaf',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'suaf'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'afectacion'); ?>
		<?php echo $form->textField($model,'afectacion',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'afectacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'presentacion'); ?>
		<?php echo $form->textField($model,'presentacion',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'presentacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'obrasocial'); ?>
		<?php echo $form->textField($model,'obrasocial',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'obrasocial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'altaFirmada'); ?>
		<?php echo $form->textField($model,'altaFirmada',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'altaFirmada'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'preocup'); ?>
		<?php echo $form->textField($model,'preocup',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'preocup'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'copiaDNI'); ?>
		<?php $form->widget('CMaskedTextField',array(
        'model'=>$model,
        'attribute'=>'copiaDNI',
        'mask'=>'99.999.999',));?>
		<?php echo $form->error($model,'copiaDNI'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cuil'); ?>
		<?php $form->widget('CMaskedTextField',array(
        'model'=>$model,
        'attribute'=>'cuil',
        'mask'=>'99 - 99999999 - 9',));?>
		<?php echo $form->error($model,'cuil'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idsucursal'); ?>
		<?php echo $form->dropDownList($model,'idsucursal',CHtml::listData(RelojSucursales::model()->findAll(),
	     'idSucursal', 'nombreSucursal'),array ('prompt'=>'Seleccione...'));?>
		<?php echo $form->error($model,'idsucursal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dni'); ?>
		<?php $form->widget('CMaskedTextField',array(
        'model'=>$model,
        'attribute'=>'dni',
        'mask'=>'99.999.999',));?>
		<?php echo $form->error($model,'dni'); ?>
	</div>

	<div class="row">
	    <?php echo $form->labelEx($model,'idCategoria'); ?>
	    <?php echo $form->dropDownList($model,'idCategoria',CHtml::listData(RelojCategorias::model()->findAll(),
	     'idCateogria', 'nombreCategoria'),array ('prompt'=>'Seleccione...'));?>
		<?php echo $form->error($model,'idCategoria'); ?>
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->