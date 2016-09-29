<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tareas-estados-form',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,'fechaEstadoTarea')
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->textField($model,'idTarea',array('size'=>30,'maxlength'=>30,'TYPE'=>'hidden')); ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaEstadoTarea'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
    		'name'=>'TareasEstados[fechaEstadoTarea]',
    		'value'=>$model->fechaEstadoTarea,
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
		<?php echo $form->labelEx($model,'detalleEstadoTarea'); ?>
		<?php echo $form->textArea($model,'detalleEstadoTarea',array('rows'=>3, 'class'=>'span6')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombreEstado'); ?>
		<?php echo  $form->dropDownList($model,'nombreEstado',$model->getEstados(),array ('prompt'=>'Seleccione un Estado...'));?>
	</div>
<?php

    $cliente=Clientes::model()->findByPk($_GET['idCliente']);
    echo $this->renderPartial('/clientes/_envioInformacion',array('cliente'=>$cliente),true);
    
    
    ?>

<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
		<?php echo CHtml::resetButton('Reset',array('class'=>'btn ')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->