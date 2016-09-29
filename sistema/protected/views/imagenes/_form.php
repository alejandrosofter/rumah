<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'imagenes-form',
	'enableAjaxValidation'=>false,'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model); ?>
	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textField($model,'fecha',array('TYPE'=>'hidden')); ?>

		<?php echo $form->textField($model,'tipo',array('TYPE'=>'hidden')); ?>

		<?php echo $form->textField($model,'idTipo',array('TYPE'=>'hidden')); ?>

		<?php echo CHtml::activeFileField($model,'archivo'); ?>

		<?php echo $form->textField($model,'ext',array('TYPE'=>'hidden')); ?>

		<?php echo $form->textField($model,'path',array('TYPE'=>'hidden')); ?>
	

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>