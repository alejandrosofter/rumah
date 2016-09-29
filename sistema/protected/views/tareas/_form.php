<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tareas-form',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,'idClienteTarea'),
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'idClienteTarea'); ?>
		<?php $this->renderPartial('/clientes/buscadorClientes',array('model'=>$model,'form'=>$form,'campo'=>'idClienteTarea','nombreModelo'=>'Tareas'))?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaTarea'); ?>
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaTarea'))?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prioridadTarea'); ?>
		<?php echo  $form->dropDownList($model,'prioridadTarea',$model->getPrioridades(),array ('separator'=>'   ','prompt'=>'Seleccione una Prioridad...'));?>
	
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estadoTarea'); ?>
		<?php echo  $form->dropDownList($model,'estadoTarea',$model->getEstados(),array ('prompt'=>'Seleccione un Estado...'));?>
	
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcionTarea'); ?>
		<?php echo $form->textArea($model,'descripcionTarea',array('rows'=>5, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipoTarea'); ?>
		<?php echo  $form->dropDownList($model,'tipoTarea',$model->getTipos(),array ('prompt'=>'Seleccione un Tipo de Tarea...'));?>
	
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'visitaRutina'); ?>
		<?php echo $form->checkBox($model,'visitaRutina'); ?>
	
	</div>
            <?php if(Settings::model()->getValorSistema('TAREAS_ALERTAS_MANT_MAIL')==1){
                echo CHtml::image('images/iconos/famfam/email.png');
                echo ' Se enviara un mail al Encargado de mantenimiento';
            }?>

	<div class="actions">
            
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
		<?php echo CHtml::resetButton('Reset',array('class'=>'btn ')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->