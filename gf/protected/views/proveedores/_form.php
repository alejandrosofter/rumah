<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'proveedores-form',
	'focus'=>array($model,'codigoProveedor'),
	'enableAjaxValidation'=>false, )); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'CodProveedor'); ?>
		<?php echo $form->textField($model,'codigoProveedor',array('class'=>'span2','maxlength'=>40)); ?>

	</div>
	
	<div class="row" >
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',
		array('size'=>30,'maxlength'=>120,
		'style'=>"text-transform: uppercase;",
		'onBlur'=>'this.value = this.value.toUpperCase(); ')); ?>

	</div>
        <div class="row" >
		<?php echo $form->labelEx($model,'nombreFantasia'); ?>
		<?php echo $form->textField($model,'nombreFantasia',
		array('size'=>30,'maxlength'=>120,
		'style'=>"text-transform: uppercase;",
		'onBlur'=>'this.value = this.value.toUpperCase(); ')); ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cuit'); ?>
		<?php $form->widget('CMaskedTextField',array(
        'model'=>$model,
        'attribute'=>'cuit',
        'mask'=>'99 - 99999999 - 9',
		'htmlOptions' => array('class' => 'span3')
      ));?>
		
	</div>
	

	
		<div class="row">
		<?php echo $form->labelEx($model,'Letra Habitual'); ?>
		<?php echo  $form->dropDownList($model,'letraHabitual',Clientes::model()->getCondicionesFactura(),array ('prompt'=>'Seleccione ...'));?>
	<span class="help-block">
<b>NOTA: </b> Se refiere a la letra de la FACTURACION que va a ir por defecto cuando se seleccione el CLIENTE.</span>
	</div>

<div class="row" >
		<?php echo $form->labelEx($model,'condicionIva'); ?>
	
		<?php echo  $form->dropDownList($model,'condicionIva',FacturasEntrantes::model()->getCondicionIva(),array ('prompt'=>'Seleccione ...'));?>
		
	</div>
		<div class="row">
		<?php echo $form->labelEx($model,'Clasificacion AFIP'); ?>
	<?php echo  $form->dropDownList($model,'idClasificacionAfip',CHtml::listData(ClasificacionAfip::model()->consultasClasif(),
	 'idClasificacionAfip', 'afipClasificacion'),array ('prompt'=>'Seleccione ...'));?>
		
	</div>
		<div >
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>80,'maxlength'=>80)); ?>
		
	</div>



	<div >
		<?php echo $form->labelEx($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>80,'maxlength'=>80)); ?>
		
	</div>

	<div >
		<?php echo $form->labelEx($model,'celular'); ?>
		<?php echo $form->textField($model,'celular',array('size'=>80,'maxlength'=>80)); ?>
		
	</div>	

	<div class="row">
		<?php echo $form->labelEx($model,'localidad'); ?>
		<?php echo $form->textField($model,'localidad',array('size'=>120,'maxlength'=>120)); ?>
	
	</div>
<div class="row" >
		<?php echo $form->labelEx($model,'Calle y Nro'); ?>
		<?php echo $form->textField($model,'direccion',array('size'=>80,'maxlength'=>80)); ?>
		<?php echo $form->textField($model,'nro',array('class'=>'span2','maxlength'=>15)); ?>
	</div>


			<div class="row">
		<?php echo $form->labelEx($model,'juridiccion'); ?>
	<?php echo  $form->dropDownList($model,'idJuridiccion',CHtml::listData(Juridicciones::model()->findAll(), 'idJuridiccion', 'nombreJuridiccion'),array ('prompt'=>'Seleccione ...'));?>
		
	</div>


	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn primary')); ?>
		<?php echo CHtml::resetButton('Reset',array('class'=>'btn')); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->