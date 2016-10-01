<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'facturas-salientes-corriente-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

<?php echo $form->textField($model,'idFacturaSaliente',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaDesde'); ?>
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaDesde'))?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaHasta'); ?>
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaHasta'))?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estadoFactura'); ?>
		<?php echo  $form->dropDownList($model,'estadoFactura',$model->getEstados(),array ('prompt'=>'Seleccione el Estado...'));?>
	
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comentario'); ?>
		<?php echo $form->textArea($model,'comentario',array('rows'=>6, 'cols'=>50)); ?>

	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'periodicidad'); ?>
		<?php echo $form->textField($model,'periodicidad'); ?>

	</div>

	<div class="actions">
		<?php echo CHtml::submitButton('Guardar Factura',array('class'=>'btn primary')); ?>
		<?php echo CHtml::submitButton('Reset',array('class'=>'btn ')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->