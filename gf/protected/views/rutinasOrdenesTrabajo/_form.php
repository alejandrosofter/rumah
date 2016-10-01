<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rutinas-ordenes-trabajo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos</p>

	<?php echo $form->errorSummary($model); ?>
        
        <div class="row">
		<?php echo $form->labelEx($model,'esPredeterminada'); ?>
		<?php echo $form->checkbox($model,'esPredeterminada'); ?>
		<?php echo $form->error($model,'esPredeterminada'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'nombreRutina'); ?>
		<?php echo $form->textField($model,'nombreRutina',array('class'=>'span7','maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombreRutina'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'idStock'); ?>
		
            <?php echo $this->renderPartial('/stock/buscadorProductos',array('model'=>$model,'class'=>'span6','campo'=>'idStock','nombreStock'=>'idStock','nombreModelo'=>'RutinasOrdenesTrabajo','extra'=>''));?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'esFacturable'); ?>
		<?php echo $form->checkBox($model,'esFacturable'); ?>
		<?php echo $form->error($model,'esFacturable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'esContratada'); ?>
		<?php echo $form->checkBox($model,'esContratada'); ?>
		<?php echo $form->error($model,'esContratada'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'duracionDias'); ?>
		<?php echo $form->textField($model,'duracionDias',array('class'=>'span1')); ?>
		<?php echo $form->error($model,'duracionDias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prioridad'); ?>
		<?php echo  $form->dropDownList($model,'prioridad',  OrdenesTrabajo::model()->getPrioridades(),array ('prompt'=>'Seleccione una Prioridad...'));?>
	
		<?php echo $form->error($model,'prioridad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcionCliente'); ?>
		<?php echo $form->textArea($model,'descripcionCliente',array('class'=>'span6', 'rows'=>4)); ?>
			<span class='help-block'><b>NOTA: </b>Datos relevantes que proporciona el cliente. </span>
	
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcionEncargado'); ?>
		<?php echo $form->textArea($model,'descripcionEncargado',array('rows'=>3, 'cols'=>30)); ?>
		<span class='help-block'><b>NOTA: </b>Datos relevantes que le pueden servir al encargado. </span>
	
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->