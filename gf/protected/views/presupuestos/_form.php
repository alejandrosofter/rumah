<?php $form=$this->beginWidget('CActiveForm', array(
'focus'=>array($model,'asuntoPresupuesto'),
'id'=>'formCrearFactura'
));?>
<div class="form">


	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	
	<div class="row">
		<?php echo $form->labelEx($model,'tipoPresupuesto'); ?>
		<?php echo  $form->dropDownList($model,'tipoPresupuesto',$model->getTipoPresupuestos());?>
		
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'fechaPresupuesto'); ?>
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaPresupuesto'),false); ?>
		
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo  $form->dropDownList($model,'estado',$model->getEstados(),array ('prompt'=>'Seleccione el estado...'));?>
	
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'asuntoPresupuesto'); ?>
		<?php echo $form->textField($model,'asuntoPresupuesto',array('class'=>'span6','maxlength'=>180)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idClientePresupuesto'); ?>
		<?php $this->renderPartial('/clientes/buscadorClientes',array('nombreModelo'=>'Presupuestos','form'=>$form,'model'=>$model,'campo'=>'idClientePresupuesto'),false); ?>
	
	</div>
	
	

	
	
		
	


	<div class="row">
		<?php echo $form->labelEx($model,'descripcionPresupuesto'); ?>
		<?php echo $form->textArea($model,'descripcionPresupuesto',array('rows'=>3, 'class'=>'span6')); ?>
		
	</div>

		
	<div class="row">
		<?php echo $form->labelEx($model,'formaPago'); ?>
		<?php echo $form->textArea($model,'formaPago',array('rows'=>3, 'class'=>'span6')); ?>
		
	</div>

<div class="row">
		<?php echo $form->labelEx($model,'fechaentrega'); ?>
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaentrega')) ?>
		
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'fechaVencimiento'); ?>
		<?php $this->renderPartial('/varios/campoFecha',array('model'=>$model,'campo'=>'fechaVencimiento')) ?>
		
	</div>
	
	

        <div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
		<?php echo CHtml::resetButton('Reset',array('class'=>'btn')); ?>
	</div>

</div><!-- form -->
 <?php $this->endWidget(); ?>