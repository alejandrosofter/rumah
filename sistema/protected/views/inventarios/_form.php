<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'inventarios-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	

	<div class="row">
		<?php echo $form->labelEx($model,'fechaInventario'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name'=>'Inventarios[fechaInventario]',
   'value'=>$model->fechaInventario,
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
		<?php echo $form->labelEx($model,'descripcionInventario'); ?>
		<?php echo $form->textArea($model,'descripcionInventario',array('rows'=>6, 'cols'=>50)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'esPredeterminado'); ?>
		<?php echo $form->checkBox($model,'esPredeterminado'); ?>
		
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->