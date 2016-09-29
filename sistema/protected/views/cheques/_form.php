<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cheques-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaEmision'); ?>
		<?php 	$form->widget('zii.widgets.jui.CJuiDatePicker', array(
    		  	'name'=>'Cheques[fechaEmision]',
    		  	'value'=>$model->fechaEmision,
    			'options'=>array(
        		'showAnim'=>'fold',
        		'dateFormat' => 'yy-mm-dd',
   				),
    		'htmlOptions'=>array(
        	'style'=>'height:20px;'),)); ?>
		<?php echo $form->error($model,'fechaEmision'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaCobro'); ?>
		<?php 	$form->widget('zii.widgets.jui.CJuiDatePicker', array(
    		  	'name'=>'Cheques[fechaCobro]',
    		  	'value'=>$model->fechaCobro,
    			'options'=>array(
        		'showAnim'=>'fold',
        		'dateFormat' => 'yy-mm-dd',
   				),
    		'htmlOptions'=>array(
        	'style'=>'height:20px;'),)); ?>
		<?php echo $form->error($model,'fechaCobro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idCliente'); ?>
		<?php echo $form->dropDownList($model,'idCliente',CHtml::listData(Clientes::model()->consultarNombre(), 'idCliente', 'cliente','tipoCliente'),array ('prompt'=>'Seleccione el Cliente...'));?>
		<?php echo $form->error($model,'idCliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'paguese'); ?>
		<?php echo $form->textArea($model,'paguese',array('rows'=>2, 'cols'=>50)); ?>
		<?php echo $form->error($model,'paguese'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'importe'); ?>
		<?php echo $form->textField($model,'importe'); ?>
		<?php echo $form->error($model,'importe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'esCruzado'); ?>
		<?php echo  $form->checkBox($model,'esCruzado');?>
		<?php echo $form->error($model,'esCruzado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idCuenta'); ?>
		<?php echo  $form->dropDownList($model,'idCuenta',CHtml::listData(CuentasEfectivo::model()->findAll(), 'idCuentaEfectivo', 'nombre'),array ('prompt'=>'Seleccione una cuenta...'));?>
		<?php echo $form->error($model,'idCuenta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numeroCheque'); ?>
		<?php echo $form->textField($model,'numeroCheque'); ?>
		<?php echo $form->error($model,'numeroCheque'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->