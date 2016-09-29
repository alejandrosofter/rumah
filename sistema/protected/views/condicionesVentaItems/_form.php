<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'condiciones-venta-items-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridoss.</p>

	

		<?php echo $form->textField($model,'idCondicionVenta',array('TYPE'=>'hidden')); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'porcentajeTotalFacturado'); ?>
		<?php echo $form->textField($model,'porcentajeTotalFacturado',array('class'=>'span2')); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidadCuotas'); ?>
		<?php echo $form->textField($model,'cantidadCuotas',array('class'=>'span1')); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'aVencerEnDias'); ?>
		<?php echo $form->textField($model,'aVencerEnDias',array('class'=>'span1')); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CantidadDiasMesesCuotas'); ?>
		
		<?php echo $form->textField($model,'letraDiaMes',array('class'=>'span2')); ?>
		<?php echo $form->textField($model,'CantidadDiasMesesCuotas',array('class'=>'span2')); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'porcentajeInteres'); ?>
		<?php echo $form->textField($model,'porcentajeInteres',array('class'=>'span3')); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaVencimiento'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name'=>'CondicionesVentaItems[fechaVencimiento]',
    'value'=>$model->fechaVencimiento,
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



	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->