<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gastos-factura-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->textField($model,'idGasto',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idFacturaSaliente'); ?>
		<?php echo  $form->dropDownList($model,'idFacturaSaliente',CHtml::listData(FacturasEntrantes::model()->consultarFacturasProveedor($idProveedor), 'idFacturaEntrante', 'nombreFactura'),array ('prompt'=>'Seleccione la Factura de Compra...'));?>
		<?php echo $form->error($model,'idFacturaSaliente'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo  $form->dropDownList($model,'estado',FacturasEntrantes::model()->getEstados(),array ('prompt'=>'Seleccione el estado...'));?>
		<?php echo $form->error($model,'estado'); ?>
	</div>

	
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Finalizar Pago' : 'Guardar'); ?>
	

<?php $this->endWidget(); ?>
<?php $form=$this->beginWidget('CActiveForm', array(
'action'=>Yii::app()->createUrl("/gastos"),
)); ?>


	
		<?php //if($model->isNewRecord) echo CHtml::submitButton('Finalizar Pago'); ?>


<?php $this->endWidget(); ?>
</div><!-- form -->