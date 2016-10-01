<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'facturas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha',array('class'=>'')); ?>
		<?php echo $form->textField($model,'fecha',array('class'=>'')); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idCliente',array('class'=>'')); ?>
		<?php echo $form->textField($model,'idCliente',array('class'=>'')); ?>
		<?php echo $form->error($model,'idCliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nroFactura',array('class'=>'')); ?>
		<?php echo $form->textField($model,'nroFactura',array('class'=>'','size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nroFactura'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado',array('class'=>'')); ?>
		<?php echo $form->textField($model,'estado',array('class'=>'','size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idTalonario',array('class'=>'')); ?>
		<?php echo $form->textField($model,'idTalonario',array('class'=>'')); ?>
		<?php echo $form->error($model,'idTalonario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bonificacion',array('class'=>'')); ?>
		<?php echo $form->textField($model,'bonificacion',array('class'=>'')); ?>
		<?php echo $form->error($model,'bonificacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'interes',array('class'=>'')); ?>
		<?php echo $form->textField($model,'interes',array('class'=>'')); ?>
		<?php echo $form->error($model,'interes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idVendedor',array('class'=>'')); ?>
		<?php echo $form->textField($model,'idVendedor',array('class'=>'')); ?>
		<?php echo $form->error($model,'idVendedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'importe',array('class'=>'')); ?>
		<?php echo $form->textField($model,'importe',array('class'=>'')); ?>
		<?php echo $form->error($model,'importe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'importeSaldo',array('class'=>'')); ?>
		<?php echo $form->textField($model,'importeSaldo',array('class'=>'')); ?>
		<?php echo $form->error($model,'importeSaldo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->