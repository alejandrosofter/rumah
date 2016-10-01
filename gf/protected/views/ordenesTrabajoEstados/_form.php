<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ordenes-trabajo-estados-form',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,'detalleEstado')
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaEstado'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name'=>'OrdenesTrabajoEstados[fechaEstado]',
    'value'=>$model->fechaEstado,
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
        'dateFormat' => 'yy-mm-dd',
    ),
    'htmlOptions'=>array(
    	
        'style'=>'height:20px;'
    ),
)); ?>
</div>
	<div class="row">
		<?php echo $form->textField($model,'idUsuario',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden','VALUE'=>$idUsuario)); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'idOrdenTrabajo',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden','VALUE'=>$idOrden)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->dropDownList($model,'estado',OrdenesTrabajo::model()->getEstados(),array ('prompt'=>'Seleccione un Estado...'));?>

	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'enviaMail'); ?>
		<?php echo $form->checkBox($model,'enviaMail'); ?>
		<?php echo $form->error($model,'enviaMail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'detalleEstado'); ?>
		<?php echo $form->textArea($model,'detalleEstado',array('rows'=>3, 'class'=>'span6')); ?>
	</div>

<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
		<?php echo CHtml::resetButton('Reset',array('class'=>'btn ')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->