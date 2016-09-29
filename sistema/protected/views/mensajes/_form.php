<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mensajes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cuerpoMensaje'); ?>
		<?php echo $form->textArea($model,'cuerpoMensaje',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'cuerpoMensaje'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tituloMensaje'); ?>
		<?php echo $form->textField($model,'tituloMensaje',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tituloMensaje'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipoMensaje'); ?>
		<?php echo  $form->dropDownList($model,'tipoMensaje',$model->getTipos(),array ('prompt'=>'Seleccione ...'));?>
		<?php echo $form->error($model,'tipoMensaje'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'destinatario'); ?>
		<?php $this->renderPartial('/clientes/_buscadorClientesMail',array('model'=>$model,'campo'=>'destinatario','nombreModelo'=>'Mensajes'))?>
		
            <span class='help-block'>En caso de EMAIL el correo, en caso de TELEFONO por favor su correspondiente nro </span>
		<?php echo $form->error($model,'destinatario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'remitente'); ?>
		<?php echo $form->textField($model,'remitente',array('size'=>60,'maxlength'=>255)); ?>
             <span class='help-block'>Solamente para el caso de los EMAILS</span>
		<?php echo $form->error($model,'remitente'); ?>
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton('Enviar',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->