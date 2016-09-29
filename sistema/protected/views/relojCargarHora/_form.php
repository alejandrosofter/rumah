<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reloj-cargar-hora-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fecha'))?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'fechaDesde'); ?>
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaDesde'))?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'fechaHasta '); ?>
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaHasta'))?>
	</div>
	

	<div class="row">
		<?php echo CHtml::form('','post',array('enctype'=>'multipart/form-data')); ?>
		<?php echo $form->labelEx($model,'Archivo'); ?>
		<?php echo CHtml::activeFileField($model, 'archivo'); ?>
	<?php // echo $form->  fileField($model,'archivo'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->textField($model,'idUsuario', array('TYPE'=>'hidden')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idSucursal'); ?>
		<?php echo $form->dropDownList($model,'idSucursal',CHtml::listData(RelojSucursales::model()->findAll(),
	     'idSucursal', 'nombreSucursal'),array ('prompt'=>'Seleccione...'));?>
		<?php echo $form->error($model,'idSucursal'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'nombreArchivo',array('TYPE'=>'hidden','class'=>'span2','maxlength'=>255)); ?>
	</div>

	 <div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn primary')); ?>
	</div> 

<?php $this->endWidget(); ?>

</div><!-- form -->